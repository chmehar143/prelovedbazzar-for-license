<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Cart, Vendor, Product, User};
class CartController extends Controller
{

    public function index()
    {
        return view('user.cart');
    }

    public function store(Request $request){
        $item = Product::where('id', $request->id)->where('status', 1)->first();
        if($item->p_stock >= 3){
            if($request->quantity <= $item->p_stock){
                if(Auth::guard('user')->check()){
                    $cart = Cart::where('prod_id', $request->id)
                    ->where('user_id', Auth::guard('user')->id())->first();
                    if($cart){
                        $cart->quantity = $cart->quantity + $request->quantity;
                        $cart->net_price = $cart->net_price + $item->p_new_price * $request->quantity;
                        $item->p_stock = $item->p_stock - $request->quantity;
                        $item->update();
                        $cart->update();
                    }
                    else{
                        $cart = new Cart();
                        $cart->prod_id = $request->id;
                        $cart->user_id = Auth::guard('user')->id();
                        $cart->session_id = Session::getId();
                        $cart->quantity = $request->quantity;
                        $cart->price = $item->p_new_price;
                        $cart->color = $item->p_color;
                        $cart->net_price = $cart->net_price + $item->p_new_price * $request->quantity;
                        $cart->size = $request->size;
                        $item->p_stock = $item->p_stock - $request->quantity;
                        $item->update();
                        $cart->save();
                    }
                    return response()->json([
                        "status" => 200,
                        "data" => $cart
                    ]);
                }
                else{
                    $cart = Cart::where('prod_id', $request->id)->where('session_id',Session::getId())->first();
                    if($cart){
                        $cart->quantity = $cart->quantity + $request->quantity;
                        $cart->net_price = $cart->net_price + $item->p_new_price * $request->quantity;
                        $item->p_stock = $item->p_stock - $request->quantity;
                        $item->update();
                        $cart->update();
                    }
                    else{
                        $cart = new Cart();
                        $cart->prod_id = $request->id;
                        $cart->session_id = Session::getId();
                        $cart->quantity = $request->quantity;
                        $cart->price = $item->p_new_price;
                        $cart->color = $item->p_color;
                        $cart->net_price = $cart->net_price + $item->p_new_price * $request->quantity;
                        $cart->size = $request->size;
                        $item->p_stock = $item->p_stock - $request->quantity;
                        $item->update();
                        $cart->save();
                    }
                    return response()->json([
                        "status" => 200,
                        "data" => $cart
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => 403,
                    "data" => 'item is out of stock, no more to be added'
                ]);  
            }

        }
        else{
            return response()->json([
                "status" => 403,
                "data" => 'item is out of stock, no more to be added'
            ]);
        }
            
        
    }
  
}
