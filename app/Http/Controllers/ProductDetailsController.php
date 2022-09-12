<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::where('id', $product->p_catog)->first();
        $subcategory = Subcategory::where('id', $product->p_sub_catog)->first();
        $childcategory = Childcategory::where('id', $product->p_child_catog)->first();
        $vendor = Vendor::where('id', $product->vendor_id)->first();
        $moreproducts = Product::where('vendor_id', $vendor->id)
        ->join('categories', 'products.p_catog','=','categories.id')
        ->select('products.*', 'categories.name')->get();
        $related_products = Product::where('p_catog', $product->p_catog)
            ->orWhere('p_sub_catog', $product->p_sub_catog)->orWhere('p_child_catog', $product->p_child_catog)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        return view('user.product-details', compact('product','vendor',
                    'category','subcategory','childcategory','moreproducts', 'related_products'));

    }
}
