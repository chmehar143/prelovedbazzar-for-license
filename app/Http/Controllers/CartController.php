<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;
class CartController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $carts = Cart::where('user_id', $user->id())
            ->join('products','carts.prod_id', '=', 'products.id')
            ->get();
            return view('user.cart', compact('carts'));
        }
        else{
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)
            ->join('products','carts.prod_id', '=', 'products.id')
            ->get();
            return view('user.cart', compact('carts'));
        }
    }

    public function store(Request $request){
        if(Auth::guard('user') != NULL){
            $cart = Cart::where('prod_id', $request->id)
            ->where('user_id', Auth::guard('user')->id())->first();
            if($cart){
                $cart->quantity = $cart->quantity + $request->quantity;
                $cart->update();
            }
            else{
                $cart = new Cart();
                $cart->prod_id = $request->id;
                $cart->user_id = Auth::guard('user')->id();
                $cart->session_id = Session::getId();
                $cart->quantity = $request->quantity;
                $cart->size = $request->size;
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
                $cart->update();
            }
            else{
                $cart = new Cart();
                $cart->prod_id = $request->id;
                $cart->session_id = Session::getId();
                $cart->quantity = $request->quantity;
                $cart->size = $request->size;
                $cart->save();
            }
            return response()->json([
                "status" => 200,
                "data" => $cart
            ]);
        }
    }

    public function clear(){
        if(Auth::guard('user')){
            $carts = Cart::where('user_id', Auth::guard('user')->id())->get();
            foreach($carts as $cart){
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
                $cart->delete();
            }
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }

    public function remove($id){
        if(Auth::guard('user')){
            $cart = Cart::where('prod_id', $id)->where('user_id', Auth::guard('user')->id())->first();
            $cart->delete();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
        else{
            $session = Session::getId();
            $cart = Cart::where('prod_id', $id)->where('session_id', $session)->first();
            $cart->delete();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }

    public function update(Request $request){
        if(Auth::guard('user')){
            $cart = Cart::where('prod_id', $request->id)->where('user_id', Auth::guard('user')->id())->first();
            $cart->quantity = $request->quantity;
            $cart->update();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been updated'

            ]);
        }
        else{
            $session = Session::getId();
            $cart = Cart::where('prod_id', $request->id)->where('session_id', $session)->first();
            $cart->quantity = $request->quantity;
            $cart->update();
            return response()->json([
                'status'=> 200,
                'success'=>'Data has been deleted'

            ]);
        }
    }

    
}
