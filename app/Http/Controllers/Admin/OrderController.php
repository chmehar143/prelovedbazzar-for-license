<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Redirect;
use Validator;
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
        $this->middleware('admin.auth:admin');
    }

    

    //all orrder

    public  function  allorder()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        $status = Config::get('constants.order_status');
        return view('admin.order.allorder', compact('orders', 'status'));
    }

    public  function  allorderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $status = Config::get('constants.order_status');
        return view('admin.order.allorderdetails', compact('order', 'status'));
    }

    public  function  allorderinvoice()
    {
        return view('admin.order.allorderinvoice');
    }

    public  function  allorderdelivery($id)
    {
        $sub_order = OrderDetail::where('id', $id)->first();
        $order_status = Config::get('constants.order_status');
        return view('admin.order.allorderdelivery', compact('sub_order', 'order_status'));
    }

    public  function  allorderstatus(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'sub_status' => 'required|integer',
            'tracking' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //--- end validation

        $sub_order = OrderDetail::where('id', $id)->first();
        $sub_order->sub_status = $request->input('sub_status');
        $sub_order->tracking = $request->input('tracking');
        $sub_order->update();
        return redirect()->back();
    }





    //complete orrder


    public  function  completedorder()
    {
        $orders = Order::where('status', 2)->get();
        $status = Config::get('constants.order_status');
        return view('admin.order.complete.completedorder', compact('orders', 'status'));
    }



    public  function  completeorderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetail = OrderDetail::where('order_id', $id)
        ->join('products', 'order_details.pro_id','=','products.id')
        ->get();
        $status = Config::get('constants.order_status');
        $ven_status = Config::get('constants.status');
        return view('admin.order.complete.completeorderdetails', compact('order', 'status', 'orderdetail', 'ven_status'));
    }

    public  function  completeorderinvoice()
    {
        return view('admin.order.complete.completeorderinvoice');
    }



    public  function  completeorderdelivery()
    {
        return view('admin.order.complete.completeorderdelivery');
    }


    //declined orrder

    public  function  declineorder()
    {
        $orders = Order::where('status', 6)->get();
        $status = Config::get('constants.order_status');
        return view('admin.order.decline.declinedorder', compact('orders', 'status'));
    }

    public  function  declineorderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetail = OrderDetail::where('order_id', $id)
        ->join('products', 'order_details.pro_id','=','products.id')
        ->get();
        $status = Config::get('constants.order_status');
        $ven_status = Config::get('constants.status');
        return view('admin.order.decline.declineorderdetails', compact('order', 'status', 'orderdetail', 'ven_status'));
    }

    public  function  declineorderinvoice()
    {
        return view('admin.order.decline.declineorderinvoice');
    }

    public  function  declineorderdelivery()
    {
        return view('admin.order.decline.declineorderdelivery');
    }



    //pending orrder

    public  function  pendingorder()
    {
        $orders = Order::where('status', 0)->get();
        $status = Config::get('constants.order_status');
        return view('admin.order.pending.pendingorder', compact('orders', 'status'));
    }

    public  function  pendingorderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetail = OrderDetail::where('order_id', $id)
        ->join('products', 'order_details.pro_id','=','products.id')
        ->get();
        $status = Config::get('constants.order_status');
        $ven_status = Config::get('constants.status');
        return view('admin.order.pending.pendingorderdetails', compact('order', 'status', 'orderdetail', 'ven_status'));
    }

    public  function  pendingorderinvoice()
    {
        return view('admin.order.pending.pendingorderinvoice');
    }



    public  function  pendingorderdelivery()
    {
        return view('admin.order.pending.pendingorderdelivery');
    }


    public  function  processingorder()
    {
        $orders = Order::where('status', 1)->get();
        $status = Config::get('constants.order_status');
        return view('admin.order.processing.processingorder', compact('orders', 'status'));
    }

    public  function  processingorderdetails($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetail = OrderDetail::where('order_id', $id)
        ->join('products', 'order_details.pro_id','=','products.id')
        ->get();
        $status = Config::get('constants.order_status');
        $ven_status = Config::get('constants.status');
        return view('admin.order.processing.processingorderdetails', compact('order', 'status', 'orderdetail', 'ven_status'));
    }

    public  function  processingorderinvoice()
    {
        return view('admin.order.processing.processingorderinvoice');
    }

    public  function  processingorderdelivery()
    {
        return view('admin.order.processing.processingorderdelivery');
    }
}
