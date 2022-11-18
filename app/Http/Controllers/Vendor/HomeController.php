<?php

namespace App\Http\Controllers\Vendor;

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
        $this->middleware('vendor.auth:vendor');
        $orders = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->where('sub_status', 5)->get();
        $amount = $orders->sum('subtotal') + $orders->sum('sub_shipping');

        $vendordata = array(
            'orders' => $orders,
            'amount' => $amount
        );

        view()->share('vendordata', $vendordata);

    }

    /**
     * Show the Vendor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $products = OrderDetail::where('order_details.vendor_id', Auth::guard('vendor')->id())->join('products', 'pro_id', '=', 'products.id')->get()->groupBy('pro_id');
        $month_wise_count = [];
        $month = [];

        $items = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->select(
            DB::raw("(COUNT(*)) as count"),
            DB::raw("MONTHNAME(created_at) as month_name")
            )->whereYear('created_at', date('Y'))->where('sub_status', 1)->groupBy('month_name')->get()->toArray();
        foreach ($items as $data){
            $month_wise_count[] = $data['count'];
            $month[] = $data['month_name'];
        }
        $product_sale = OrderDetail::where('vendor_id', Auth::guard('vendor')->id())->sum('pro_qnty');
        $total_product = Product::where('vendor_id', Auth::guard('vendor')->id())->count();
        $out_of_stock = Product::where('vendor_id', Auth::guard('vendor')->id())->where('p_stock', 0)->count();

        $sale = OrderDetail::whereDate('created_at', Carbon::today())
                        ->where('vendor_id', Auth::guard('vendor')->id())->get();
        $today_sale = $sale->sum('subtotal') + $sale->sum('sub_shipping');
        $today_order = OrderDetail::whereDate('created_at', Carbon::today())
                        ->where('vendor_id', Auth::guard('vendor')->id())->count();
        $today_confirm = OrderDetail::whereDate('created_at', Carbon::today())->where('sub_status', 2)->sum('subtotal');

        $status = Config::get('constants.status');
        $type = Config::get('constants.type');

        return view('vendor.home', compact('today_sale', 'today_order', 
                    'today_confirm', 'products', 'status', 'month', 'month_wise_count', 
                    'out_of_stock', 'product_sale', 'total_product'));
    }
}
