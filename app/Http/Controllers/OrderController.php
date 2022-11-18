<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session, Redirect};
use App\Models\{Cart, Payment, Vendor, Product, User, Order, OrderDetail, Address};
use Validator;
use Stripe;
use Config;

class OrderController extends Controller
{
    public function index($id)
    {
        $order = Order::where('id', $id)->with('order_detail')->first();
        $status = Config::get('constants.order_status');
        return view('user.order', compact('order', 'status'));
    }

    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'country' => 'required',
            'street' => 'required',
            'apart' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        if($request->has('checkbox')){
            array($rules,
            's_fname' =>'required', 
            's_lname' =>'required', 
            's_country' =>'required', 
            's_street' =>'required', 
            's_apart' =>'required', 
            's_city' =>'required', 
            's_state' =>'required', 
            's_zip' =>'required', 
            's_phone' =>'required', 
            's_lname' =>'required',          
            );
        }

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //end validation

    // save order detail...
        $order = new Order();
        if(Auth::guard('user')->check()){
            $carts = Cart::where('user_id', Auth::guard('user')->id())->get();
            $order->user_id = Auth::guard('user')->id();
        }
        else{
            $carts = Cart::where('session_id', Session::getId())->get();
        }
        // sub order payment charge...
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
          "address" => [    
            "line1" => $request->input('street'),    
            "postal_code" => $request->input('zip'),    
            "city" => $request->input('city'),    
            "state" => $request->input('state'),    
            "country" => $request->input('country'),    
          ], 
            "name" => $request->input('fname'),       
            "email" => $request->input('email'),    
            "phone" => $request->input('phone'),    
            "source" => $request->stripeToken    
        ));
        
        Stripe\Charge::create ([
            "amount" => 100 * $carts->sum('net_price'),
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Payment for puchasing some items from my " .env('APP_NAME'). "store.",
            "shipping" => [
              "name" => "$request->input('fname')",
              "address" => [
                "line1" => $request->input('street'),
                "postal_code" => $request->input('zip'),
                "city" => $request->input('city'),
                "state" => $request->input('state'),
                "country" => $request->input('country'),
              ],
            ]
        ]);
        //end payment charge...
        $order->net_amount = $carts->sum('net_price');
        if(Auth::guard('user')->check()){
        $order->user_id = Auth::guard('user')->id();
        }
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->company = $request->input('company');
        $order->country = $request->input('country');
        $order->street = $request->input('street');
        $order->apart = $request->input('apart');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->zip = $request->input('zip');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        if($request->has('checkbox')){
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
            $order->s_fname = $request->input('fname');
            $order->s_lname = $request->input('lname');
            $order->s_company = $request->input('company');
            $order->s_country = $request->input('s_country');
            $order->s_street = $request->input('street');
            $order->s_apart = $request->input('apart');
            $order->s_city = $request->input('city');
            $order->s_state = $request->input('state');
            $order->s_zip = $request->input('zip');
            $order->s_phone = $request->input('phone');
        }
        $order->note = $request->input('note');
        $order->save();
        //save address if user registered...
        if(Auth::guard('user')->check()){
            if($request->has('save_address')){
                $address = new Address();
                $address->user_id = Auth::guard('user')->id();
                $address->fname = $request->input('fname');
                $address->lname = $request->input('lname');
                $address->company = $request->input('company');
                $address->country = $request->input('country');
                $address->street = $request->input('street');
                $address->apart = $request->input('apart');
                $address->city = $request->input('city');
                $address->state = $request->input('state');
                $address->zip = $request->input('zip');
                $address->phone = $request->input('phone');
                if($request->input('checkbox') == 1){
                    $address->s_fname = $request->input('s_fname');
                    $address->s_lname = $request->input('s_lname');
                    $address->s_company = $request->input('s_company');
                    $address->s_country = $request->input('s_country');
                    $address->s_street = $request->input('s_street');
                    $address->s_apart = $request->input('s_apart');
                    $address->s_city = $request->input('s_city');
                    $address->s_state = $request->input('s_state');
                    $address->s_zip = $request->input('s_zip');
                    $address->s_phone = $request->input('s_phone');
                }
                else{
                    $address->s_fname = $request->input('fname');
                    $address->s_lname = $request->input('lname');
                    $address->s_company = $request->input('company');
                    $address->s_country = $request->input('s_country');
                    $address->s_street = $request->input('street');
                    $address->s_apart = $request->input('apart');
                    $address->s_city = $request->input('city');
                    $address->s_state = $request->input('state');
                    $address->s_zip = $request->input('zip');
                    $address->s_phone = $request->input('phone');
                }
                $address->save();
            }
        }
        //end saving address...
        //Start payment data stored in table...
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->card_id = $customer->id;
        $payment->phone = $customer->phone;
        $payment->email = $customer->email;
        $payment->save();
        //End store payment...
        //start order detail data
        foreach($carts as $cart){
            $product = Product::where('id', $cart->prod_id)->where('status', 1)->with('vendor')->first();
            $detail = new OrderDetail();
            $detail->order_id = $order->id;
            $detail->pro_id = $cart->prod_id;
            $detail->item_name = $product->p_name;
            $detail->vendor_id = $product->vendor_id;
            $detail->seller_name = $product->vendor->name;
            $detail->store_name = $product->vendor->shop;
            $detail->pro_qnty = $cart->quantity;
            $detail->price = $cart->price;
            $detail->color = $cart->color;
            $detail->size = $cart->size;
            $detail->subtotal = $cart->net_price;
            $detail->vendor_id = $cart->products->vendor_id;
            $detail->seller_name = $cart->products->vendor->name;
            $detail->store_name = $cart->products->vendor->shop_name;
            $detail->item_name = $cart->products->p_name;
            $detail->save();
            $cart->delete();
        }
        //end order datail..

        return redirect()->route('order', $order->id)->with('success', 'Thank you. Your order has been received.');
    }
}
