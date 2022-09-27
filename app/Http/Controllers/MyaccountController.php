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
use App\Models\Address;
use Config;

class MyaccountController extends Controller
{
    public function index()
    {
        if(Auth::guard('user')->check()){
            $use = Auth::guard('user');
            $user = User::where('id', $use->id())->first();
            $address = Address::where('user_id', $use->id())->first();
            if(!$address){
                $address = NULL;
            }
            $country = Config::get('constants.country');
            $orders = Order::where('user_id', $use->id())->get();
            return view('user.my-account',compact('user', 'orders', 'address', 'country'));
        }
        else{
            return redirect()->route('login');
        }
    }
}
