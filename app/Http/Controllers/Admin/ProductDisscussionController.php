<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Discussion;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Config;

class ProductDisscussionController extends Controller
{
    public  function  comments()
    {
        $reviews = Discussion::join('products', 'item', '=', 'products.id')
        ->select('discussions.*', 'products.p_name')
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
        ->select('discussions.*', 'products.p_name','products.p_new_price')
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
