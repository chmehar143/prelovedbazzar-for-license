<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{
    Cart, Category, Subcategory, Vendor, Product, User, Order, OrderDetail, Address
};
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.auth:user');
        if (Auth::guard('user')->check()) {
            $user = Auth::guard('user')->user();

            if(User::where('id', $user->id)->whereNotNull('email_verified_at')->exists())
            {
                $carts = Cart::where('user_id', Auth::guard('user')->id())
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
            }
        } 
        else {
            $session = Session::getId();
            $carts = Cart::where('session_id', $session)
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        }
        $categories = Category::where('status', 1)->get();
        $subcategories = Subcategory::where('status', 1)->get();

        $shareData = array(
            'categories' => $categories,
            'subcategories' => $subcategories,
            'carts' => $carts
        );
        if (Auth::guard('user')->check()) 
        {
            $shareData['user'] = Auth::guard('user')->user();
        }

        view()->share('shareData', $shareData);

    }

    /**
     * Show the User dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
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
}
