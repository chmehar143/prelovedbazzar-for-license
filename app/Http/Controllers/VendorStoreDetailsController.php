<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;

class VendorStoreDetailsController extends Controller
{
    public function index($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $categories = Category::all();
        $products = Product::where('vendor_id', $id)->join('categories', 'products.p_catog','=','categories.id')
        ->select('products.*', 'categories.name')
        ->paginate(9);
        return view('user.vendor-store-details', compact('products', 'categories', 'vendor'));
    }
}
