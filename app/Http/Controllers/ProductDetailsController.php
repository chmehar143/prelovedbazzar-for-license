<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Admin;
use App\Models\Product;
use App\Models\RecentView;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;
class ProductDetailsController extends Controller
{
    public function index($id)
    {

        $product = Product::where('id', $id)->first();
        if(Auth::guard('user')->check()){
            $user = Auth::guard('user');
            $recview = RecentView::where('user_id', $user->id())->where('p_id', $id)->first();
            if(!$recview){
                $recview = new RecentView();
                $recview->user_id = $user->id();
                $recview->p_id = $id;
                $recview->pname = $product->p_name;
                $recview->pimage = $product->p_image;
                $recview->save();
            }
        }
        else{
            $session = Session::getId();
            $recview = RecentView::where('session', $session)->where('p_id', $id)->first();
            if(!$recview){
                $recview = new RecentView();
                $recview->session = $session;
                $recview->p_id = $id;
                $recview->pname = $product->p_name;
                $recview->pimage = $product->p_image;
                $recview->save();
            }
        }
        $category = Category::where('id', $product->p_catog)->first();
        $subcategory = Subcategory::where('id', $product->p_sub_catog)->first();
        $childcategory = Childcategory::where('id', $product->p_child_catog)->first();
        $vendor = Vendor::where('id', $product->vendor_id)->first();
        $admin = Admin::where('id', $product->admin_id)->first();
        if($vendor){
            $moreproducts = Product::where('vendor_id', $vendor->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        }
        elseif($admin){
            $moreproducts = Product::where('admin_id', $admin->id)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        }
        else{
            $moreproducts = NULL;
        }
        $related_products = Product::where('p_catog', $product->p_catog)
            ->orWhere('p_sub_catog', $product->p_sub_catog)->orWhere('p_child_catog', $product->p_child_catog)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        return view('user.product-details', compact('product','vendor',
                    'category','subcategory','childcategory','moreproducts', 'related_products'));

    }
}
