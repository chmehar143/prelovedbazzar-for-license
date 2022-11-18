<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Product, Category, Subcategory, Childcategory, Gallery, OrderDetail, Withdraw};
use Validator;
use Config;

class WithdrawController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vendor.auth:vendor');
        $orders = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->where('sub_status', 5)->get();
        $amount = $orders->sum('subtotal') + $orders->sum('sub_shipping');

        $vendordata = array(
            'orders' => $orders,
            'amount' => $amount
        );

        view()->share('vendordata', $vendordata);

    }
    public function index() {
        $withdraws = Withdraw::where('vendor_id', Auth::guard('vendor')->id())->get();
        return view('vendor.withdraw.list', compact('withdraws'));
    }

    public function create()
    {
        $vendor = Auth::guard('vendor')->user();
        $orders = OrderDetail::where('vendor_id', $vendor->id)->where('sub_status', 5)->get();
        $amount = $orders->sum('subtotal') + $orders->sum('sub_shipping');
        return view('vendor.withdraw.create', compact('amount', 'vendor'));
    }

    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'email' => 'required',
            'phone' => 'required|integer',
            'amount' => 'required',
            'method' => 'required'

        ];
        $customs = [
            'phone.integer' => 'phone number is not valid'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //end validation

        $vendor = Auth::guard('vendor')->user();
        $orders = OrderDetail::where('vendor_id', $vendor->id)->where('sub_status', 5)->get();
        $amount = $orders->sum('subtotal') + $orders->sum('sub_shipping');
        $allowed = $amount * 7/10;

        $inputs = $request->all();
        $inputs['vendor_id'] = $vendor->id;
        if($request->amount > $allowed )
        {
            return redirect()->back()->with('message', 'applied amount is greater than witdraw available');
        }
        else
        {
            Withdraw::create($inputs);
            return redirect()->route('vendor.withdraw_list')->with('message', 'Successfully applied');
        }
    }


    public function edit() {
        return view('vendor.withdraw.edit');
    }

    public function view() {
        return view('vendor.withdraw.view');
    }

}
