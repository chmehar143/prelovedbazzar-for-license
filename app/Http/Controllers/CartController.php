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
        $item = Product::where('id', $request->id)->first();
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

    public function clear(){
        if(Auth::guard('user')->check()){
            $carts = Cart::where('user_id', Auth::guard('user')->id())->get();
            foreach($carts as $cart){
                $item = Product::where('id', $cart->prod_id)->first();
                $item->p_stock = $item->p_stock + $cart->quantity;
                $item->update();
                $cart->delete();
            }
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
        else{
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)->get();
            foreach($carts as $cart){
                $item = Product::where('id', $cart->prod_id)->first();
                $item->p_stock = $item->p_stock + $cart->quantity;
                $item->update();
                $cart->delete();
            }
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }

    public function remove($id){
        if(Auth::guard('user')->check()){
            $cart = Cart::where('prod_id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock + $cart->quantity;
            $item->update();
            $cart->delete();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
        else{
            $session = Session::getId();
            $cart = Cart::where('prod_id', $id)->where('session_id', $session)->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock + $cart->quantity;
            $item->update();
            $cart->delete();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }

    public function upcart($id){
        if(Auth::guard('user')->check()){
            $cart = Cart::where('prod_id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock - 1;
            $cart->quantity = $cart->quantity + 1;
            $cart->net_price = $cart->net_price + $cart->price;
            $item->update();
            $cart->update();
        }
        else{
            $session = Session::getId();
            $cart = Cart::where('prod_id', $id)->where('session_id', $session)->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock - 1;
            $cart->quantity = $cart->quantity + 1;
            $cart->net_price = $cart->net_price + $cart->price;
            $item->update();
            $cart->update();
        }
        return response()->json([
            'status'=> 200,
            'data'=> $cart
        ]);
    }

    public function down($id){
        if(Auth::guard('user')->check()){
            $cart = Cart::where('prod_id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock + 1;
            if($cart->quantity == 1){
                $cart->delete();
            }
            else{
                $cart->quantity = $cart->quantity - 1;
                $cart->net_price = $cart->net_price - $cart->price;
                $cart->update();
            }
            $item->update();
        }
        else{
            $session = Session::getId();
            $cart = Cart::where('prod_id', $id)->where('session_id', $session)->first();
            $item = Product::where('id', $cart->prod_id)->first();
            $item->p_stock = $item->p_stock + 1;
            if($cart->quantity == 1){
                $cart->delete();
            }
            else{
                $cart->quantity = $cart->quantity - 1;
                $cart->net_price = $cart->net_price - $cart->price;
                $cart->update();
            }
            $item->update();
        }
        return response()->json([
            'status'=> 200,
            'data'=> $cart
        ]);
    }   
}
