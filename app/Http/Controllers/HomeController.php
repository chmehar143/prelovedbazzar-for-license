<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
class HomeController extends Controller
{

    public function index()
    {
        $deals = Product::where('admin_id', '!=', NULL)->whereBetween('created_at', 
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->get();
        $top_sellers = Vendor::where('status', 0)->get();
        $top_categories = Category::all();
        $newarrivals = Product::whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->get();
        return view('user.welcome', compact('deals', 'top_sellers', 'top_categories', 'newarrivals'));
    }
}
