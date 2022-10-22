<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session, Redirect};
use App\Models\{
    Category, Vendor, Product, RecentView, Childcategory, 
    Subcategory, Subscriber, Discussion, User
}; 
use Carbon\Carbon;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function index()
    {
        $deals = Product::where('admin_id', '!=', NULL)->whereBetween('products.created_at', 
                [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')
                ->get();

        $top_sellers = Vendor::where('status', 0)->get();

        $top_categories = Category::all();

        $newarrivals = Product::whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->today()])->with('discussions')->get();

        $clothings = Product::where('p_catog', 1)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')->get();

        $electrics = Product::where('p_catog', 4)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')->get();

        $homes = Product::where('p_catog', 2)->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->with('discussions')->get();
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
        //--- Validation Section
        $rules = [
            'email' => 'required|email|unique:subscribers'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        }

        //in view code is here...


        // Try like this

        // error: function (xhr) {
        // $('#validation-errors').html('');
        // $.each(xhr.responseJSON.errors, function(key,value) {
        //     $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
        // }); 
        // },

        //end validation

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
