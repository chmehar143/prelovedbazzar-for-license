<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Category, Vendor, Product, Childcategory, Subcategory, Discussion, User};
class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('discussions')->join('categories', 'products.p_catog','=','categories.id')
                    ->select('products.*', 'categories.name')
                    ->paginate(9);
        return view('user.shop',compact('products', 'categories'));
    }

    public function sortby($cat_id)
    {
        $category = Category::where('id', $cat_id)->first();
        if($category){
            $products = Product::where('p_catog', $category->id)->with('discussions')
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')
            ->paginate(9);
        }
        $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

    public function subcat($sub_id)
    {
        $products = Product::where('products.status', 1)->where('p_sub_catog', $sub_id)->with('discussions')
                    ->join('categories', 'products.p_catog','=','categories.id')
                    ->select('products.*', 'categories.name')
                    ->paginate(9);

        $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

    public function sort_price($min, $max){
            $products = Product::whereBetween('p_new_price' ,[$min, $max])->with('discussions')
                ->join('categories', 'products.p_catog','=','categories.id')
                ->select('products.*', 'categories.name')
                ->paginate(9);
            $categories = Category::all();
        return view('user.shop',compact('products', 'categories'));
    }

}
