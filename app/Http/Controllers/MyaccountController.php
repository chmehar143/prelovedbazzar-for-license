<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Cart, Vendor, User, Order, OrderDetail, Address};
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
