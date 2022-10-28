<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Product};

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('products.status', 1)->join('categories', 'products.p_catog','=','categories.id')
                    ->where('p_name','LIKE','%'.$request->input('search').'%')
                    ->orWhere('p_detail','LIKE','%'.$request->input('search').'%')->with('discussions')
                    ->orwhere('categories.name', 'LIKE', '%'.$request->input('search').'%') 
                    ->select('products.*', 'categories.name')
                    ->paginate(9);

            return view('user.shop',compact('products', 'categories'));
    }
}
