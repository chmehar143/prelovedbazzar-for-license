<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        return view('user.order');
    }

    public function store(Request $request)
    {

        $order = new Order();
        if(Auth::guard('user')){
            $carts = Cart::where('user_id', Auth::guard('user')->id())->get();
            $order->user_id = Auth::guard('user')->id();
            $order->net_amount = $carts->sum('net_price');
        }
        else{
            $carts = Cart::where('session_id', Session::getId())->get();
            $order->net_amount = $carts->sum('net_price');
        }
        $order->email = $request->input('email');
        $order->fname = $request->input('firstname');
        $order->lname = $request->input('lastname');
        $order->company = $request->input('company');
        $order->country = $request->input('country');
        $order->street = $request->input('street-1');
        $order->apart = $request->input('street-2');
        $order->city = $request->input('town');
        $order->state = $request->input('state');
        $order->zip = $request->input('zip');
        $order->phone = $request->input('phone');
        if($request->input('checkbox') == 1){
            $order->s_fname = $request->input('s_fname');
            $order->s_lname = $request->input('s_lname');
            $order->s_company = $request->input('s_company');
            $order->s_country = $request->input('s_country');
            $order->s_street = $request->input('s_street');
            $order->s_apart = $request->input('s_apart');
            $order->s_city = $request->input('s_city');
            $order->s_state = $request->input('s_state');
            $order->s_zip = $request->input('s_zip');
            $order->s_phone = $request->input('s_phone');
        }
        else{
            $order->s_fname = $request->input('firstname');
            $order->s_lname = $request->input('lastname');
            $order->s_company = $request->input('company');
            $order->s_country = $request->input('country');
            $order->s_street = $request->input('street-1');
            $order->s_apart = $request->input('street-2');
            $order->s_city = $request->input('town');
            $order->s_state = $request->input('state');
            $order->s_zip = $request->input('zip');
            $order->s_phone = $request->input('phone');
        }
        $order->note = $request->input('note');
        $order->save();
        foreach($carts as $cart){
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->pro_id = $cart->prod_id;
            $detail->pro_qnty = $cart->quantity;
            $detail->price = $cart->price;
            $detail->size = $cart->size;
            $detail->subtotal = $cart->net_price;
            $detail->save();
            $cart->delete();
        }
        return redirect()->route('shop');
    }
}
