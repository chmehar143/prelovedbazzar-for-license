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
use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
class HomeController extends Controller
{

    public function index()
    {
        $deals = Product::where('admin_id', '!=', NULL)->whereBetween('products.created_at', 
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])
                ->join('discussions', 'products.id', '=', 'discussions.item')
                ->select('products.*', 'discussions.review')->get();

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
        if(Auth::guard('user')->check()){
            $recents = RecentView::where('user_id', Auth::guard('user')->id())->orderBy('created_at', 'DESC')->get();
        }
        else{
            $recents = RecentView::where('session', Session::getId())->orderBy('created_at', 'DESC')->get();
        }
           // dd($recents);
        return view('user.welcome', compact('deals', 'top_sellers', 'top_categories',
         'newarrivals', 'clothings', 'electrics', 'homes', 'recents'));
    }

    public function subscribe(Request $request)
    {
        $Subscribe = Subscriber::where('email', $request->input('email'))->first();
        if(!$Subscribe){
            $Subscribe = new Subscriber();
            if(Auth::guard('user')->check()){
                $Subscribe->user_id = Auth::guard('user')->id();
            }
            $Subscribe->email = $request->input('email');
            $Subscribe->save();    

        }
        return response()->json([
            "status" => 200,
            "data" => $Subscribe
        ]);

    }

}
