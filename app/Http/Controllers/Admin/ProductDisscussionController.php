<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB};
use App\Models\{Discussion, Product, Category, Subcategory, Childcategory};
use Config;

class ProductDisscussionController extends Controller
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

    
    public  function  comments()
    {
        $reviews = Discussion::join('products', 'item', '=', 'products.id')
        ->select('discussions.*', 'products.p_name', 'products.p_image')
        ->get();
        return view('admin.productdisscussion.comments', compact('reviews'));
    }

    public  function  report()
    {
        $reviews = Discussion::where('review', '<=', 2)->join('products', 'item', '=', 'products.id')
                ->select('discussions.*', 'products.p_name')
                ->get();
        return view('admin.productdisscussion.report', compact('reviews'));
    }


    public  function  review()
    {
        $reviews = Discussion::join('products', 'item', '=', 'products.id')
        ->select('discussions.*', 'products.p_name','products.p_new_price', 'products.p_image')
        ->get();
        return view('admin.productdisscussion.review', compact('reviews'));
    } 

    public  function  reviewview($id)
    {
        $review = Discussion::where('id', $id)->first();
        $product = Product::where('id', $review->item)->first();
        return view('admin.productdisscussion.reviewview', compact('review', 'product'));
    } 

    public  function  destroy($id)
    {
        $review = Discussion::where('id', $id)->first();
        $review->delete();
        return response()->json(['success' => 'Record Has Been Deleted!..']);
    }
}
