<?php

namespace App\Http\Controllers;

use App\Models\{ Cart, Category, Subcategory, User};
use Illuminate\Foundation\{Auth\Access\AuthorizesRequests, Bus\DispatchesJobs, Validation\ValidatesRequests };
use Illuminate\Support\Facades\{Auth, Session};
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  function  __construct()
    {
        if (Auth::guard('user')->check())
        {
            $carts = Cart::where('user_id', Auth::guard('user')->id())
            ->join('products', 'carts.prod_id', '=', 'products.id')
            ->get();

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
}
