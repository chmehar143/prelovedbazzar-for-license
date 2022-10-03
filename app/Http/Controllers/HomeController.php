<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\RecentView;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
class HomeController extends Controller
{

    public function index()
    {
        $deals = Product::where('admin_id', '!=', NULL)->whereBetween('created_at', 
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->get();

        $top_sellers = Vendor::where('status', 0)->get();

        $top_categories = Category::all();

        $newarrivals = Product::whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->get();

        $clothings = Product::where('p_catog', 1)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->get();

        $electrics = Product::where('p_catog', 4)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->get();

        $homes = Product::where('p_catog', 2)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->get();

        $recents = RecentView::where('user_id', Auth::guard('user')->id())
                    ->orWhere('session', Session::getId())->get();
           // dd($recents);
        return view('user.welcome', compact('deals', 'top_sellers', 'top_categories',
         'newarrivals', 'clothings', 'electrics', 'homes', 'recents'));
    }
}
