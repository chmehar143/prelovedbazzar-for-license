<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, File, DB};
use App\Models\{Product, Category, Subcategory, Childcategory, RecentView, OrderDetail};
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
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $products = OrderDetail::join('products', 'pro_id', '=', 'products.id')->get()->groupBy('pro_id');
        // $products = RecentView::join('products', 'p_id', '=', 'products.id')->get()->groupBy('p_id');
        //dd($products);
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.home', compact('products', 'status', 'type'));
    }
}
