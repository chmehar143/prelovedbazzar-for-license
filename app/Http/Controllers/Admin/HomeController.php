<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, File, DB};
use App\Models\{Product, Category, Subcategory, Childcategory, RecentView, OrderDetail, Order, User, Vendor};
use Carbon\Carbon;
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
            )->whereYear('created_at', date('Y'))->where('status', 1)->groupBy('month_name')->get()->toArray();
        foreach ($items as $data){
            $month_wise_count[] = $data['count'];
            $month[] = $data['month_name'];
        }
        $total_order = Order::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $total_user = User::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
        $total_vendor = Vendor::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();

        $vendor_sale = OrderDetail::whereDate('created_at', Carbon::today())
                        ->whereNotNull('vendor_id')->sum('subtotal');
        $admin_sale = OrderDetail::whereDate('created_at', Carbon::today())
                        ->whereNull('vendor_id')->sum('subtotal');
        $total_sale = OrderDetail::whereDate('created_at', Carbon::today())->sum('subtotal');

        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.home', compact('products', 'status', 'type', 
                'month', 'month_wise_count', 'total_order', 'total_user', 'total_vendor', 'vendor_sale', 'admin_sale', 'total_sale'));
    }
}
