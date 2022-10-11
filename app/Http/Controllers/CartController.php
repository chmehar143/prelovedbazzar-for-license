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
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
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
           $item = Product::where('id', $request->id)->first();
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

    public function update(Request $request){
        $data = array($request->all());
        dd($request->all());
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            foreach($data as $key => $value){
                $cart = Cart::where('prod_id', $value['id'])->where('user_id', $user->id())->get();
                $cart->net_price = $cart->net_price + $cart->price * $value['qnty'];
                $cart->quantity = $value['qnty'];
            }
        }
        return redirect()->back();
    }

    
}
