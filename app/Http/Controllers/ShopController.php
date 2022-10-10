<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::join('categories', 'products.p_catog','=','categories.id')
        ->select('products.*', 'categories.name')
        ->paginate(9);
        return view('user.shop',compact('products', 'categories'));
    }

    public function sortby($cat_id)
    {
        $category = Category::where('id', $cat_id)->first();
        if($category){
            $products = Product::where('p_catog', $category->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(9);
        }
        $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

    public function sort_price($min, $max){
            $products = Product::whereBetween('p_new_price' ,[$min, $max])
                ->join('categories', 'products.p_catog','=','categories.id')
                ->select('products.*', 'categories.name')
                ->paginate(9);
            $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

}
