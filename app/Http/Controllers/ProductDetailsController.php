<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use App\Models\{Category, Vendor, Admin, Product, Discussion, RecentView, Childcategory, Subcategory, User};
class ProductDetailsController extends Controller
{

    public function index($id)
    {

        $product = Product::where('id', $id)->where('status', 1)->with('discussions')->first();
        $allreview = Discussion::where('item', $id)->get();

        $helppositive = Discussion::where('item', $id)->whereBetween('review', [4, 5])->get();
        $helpnegative = Discussion::where('item', $id)->whereBetween('review', [1, 2])->get();

        $highrate = Discussion::where('item', $id)->where('review', 5)->get();
        $lowrate = Discussion::where('item', $id)->where('review', 1)->get();

        $five = Discussion::where('item', $id)->where('review', 5)->count();
        $four = Discussion::where('item', $id)->where('review', 4)->count();
        $three = Discussion::where('item', $id)->where('review', 3)->count();
        $two = Discussion::where('item', $id)->where('review', 2)->count();
        $one = Discussion::where('item', $id)->where('review', 1)->count();
        if(!$five){
            $five = 0;
        }
        if(!$four){
            $four = 0;
        }
        if(!$three){
            $three = 0;
        }
        if(!$two){
            $two = 0;
        }
        if(!$one){
            $one = 0;
        }
        
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
            $moreproducts = Product::where('vendor_id', $vendor->id)->where('products.status', 1)->with('discussions')
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        }
        elseif($admin){
            $moreproducts = Product::where('admin_id', $admin->id)->where('products.status', 1)->with('discussions')
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();
        }
        else{
            $moreproducts = NULL;
        }
        $related_products = Product::where('p_catog', $product->p_catog)->where('products.status', 1)->with('discussions')
            ->orWhere('p_sub_catog', $product->p_sub_catog)->orWhere('p_child_catog', $product->p_child_catog)
            ->join('categories', 'products.p_catog','=','categories.id')
            ->select('products.*', 'categories.name')->get();


        return view('user.product-details', compact('product','vendor',
                    'category','subcategory','childcategory','moreproducts', 'related_products',
                'five', 'four', 'three', 'two', 'one', 'allreview', 'helppositive', 'helpnegative', 'highrate', 'lowrate'));

    }

}
