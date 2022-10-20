<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  function  __construct()
    {
        $user = Auth::guard('user')->user();
        if (Auth::guard('user')->check()) {
            $user = Auth::guard('user');
            $carts = Cart::where('user_id', $user->id())
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        } else {
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
            'user' => $user,
            'carts' => $carts
        );

        view()->share('shareData', $shareData);
    }
}
