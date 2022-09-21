<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::guard('user')){
            $user = Auth::guard('user');
            $carts = Cart::where('user_id', $user->id())
            ->join('products','carts.prod_id', '=', 'products.id')
            ->select('carts.*','products.p_name', 'products.p_new_price')
            ->get();
        }
        else{
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)
            ->join('products','carts.prod_id', '=', 'products.id')
            ->select('carts.*','products.p_name', 'products.p_new_price')
            ->get();
        }

        return view('user.checkout', compact('carts'));
    }
}
