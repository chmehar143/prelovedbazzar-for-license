<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class PackagingController extends Controller
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
        return view('vendor.setting.packgings.list');
    }

    public function create() {
        return view('vendor.setting.packgings.create');
    }

    public function edit() {
        return view('vendor.setting.packgings.edit');
    }

    public function view() {
        return view('vendor.setting.packgings.view');
    }
}
