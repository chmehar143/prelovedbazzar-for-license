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

    public function sortby($name)
    {
        $category = Category::where('name', $name)->first();
        if($category){
            $products = Product::where('p_catog', $category->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(9);

        }
        $subcatog = Subcategory::where('name', $name)->first();
        if($subcatog){
            $products = Product::where('p_sub_catog', $subcatog->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(9);
        }
        $childcatog = Childcategory::where('name', $name)->first();
        if($childcatog){
            $products = Product::where('p_child_catog', $childcatog->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(9);
        }
        $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

    public function sort_price($min, $max){
            $products = Product::whereRaw('p_new_price >= ?' , $min)
                ->whereRaw('p_new_price <= ?', $max)
                ->join('categories', 'products.p_catog','=','categories.id')
                ->select('products.*', 'categories.name')
                ->paginate(9);
            $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

}
