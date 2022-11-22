<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\OrderDetail;
use Config;

class OrderController extends Controller
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
    
    public  function  index()
    {
        $orders = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->get();
        $status = Config::get('constants.order_status');
        return view('vendor.order.list',compact('orders', 'status'));
    }

    public  function  view($id)
    {
        $status = Config::get('constants.status');
        $detail = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->where('id', $id)->first();

        return view('vendor.order.view', compact('detail', 'status'));
    }
}
