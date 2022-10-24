<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, File, DB};
use App\Models\{Product, Category, Subcategory, Childcategory, RecentView, OrderDetail, Order};
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
        $month_wise_count = [];
        $month = [];


        $items = Order::select(
            DB::raw("(COUNT(*)) as count"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )
            ->whereYear('created_at', date('Y'))
            ->where('status', 1)
            ->groupBy('month_name')
            ->get()
            ->toArray();
        foreach ($items as $data){
            $month_wise_count[] = $data['count'];
            $month[] = $data['month_name'];
        }


        $sponsored_nft = 50;
        $simple_nft = 20;
        $feature_nft = 30;

        // $products = RecentView::join('products', 'p_id', '=', 'products.id')->get()->groupBy('p_id');
        //dd($products);
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.home', compact('products', 'status', 'type', 
                'month', 'month_wise_count', 'sponsored_nft', 'simple_nft', 'feature_nft'));
    }
}
