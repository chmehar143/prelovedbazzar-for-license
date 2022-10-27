<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Cart, Vendor, Product, User, Address};
use Config;
class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            $address = Address::where('user_id', $user->id())->first();
           // dd($address);
            $country = Config::get('constants.country');
            $carts = Cart::where('user_id', $user->id())
            ->join('products','carts.prod_id', '=', 'products.id')
            ->select('carts.*','products.p_name', 'products.p_new_price')
            ->get();
        }
        else{
            $session = Session::getId();
            $country = Config::get('constants.country');
            $address = array('fname'=>'fraz', 'lname'=>'lohar','company'=>'company','country'=>'fr',
                'street'=>'street','apart'=>'apart','city'=>'city','zip'=>'zip','state'=>'state',
                'phone'=>'phone','email'=>'email','s_fname'=>'fraz', 's_lname'=>'lohar',
                's_company'=>'company','s_country'=>'fr','s_street'=>'street','s_apart'=>'apart',
                's_city'=>'city','s_zip'=>'zip','s_state'=>'state','s_phone'=>'phone','s_email'=>'email',
            );
            $carts = Cart::where('session_id', $session)
            ->join('products','carts.prod_id', '=', 'products.id')
            ->select('carts.*','products.p_name', 'products.p_new_price')
            ->get();

        }
        return view('user.checkout', compact('carts','address','country'));
    }
}
