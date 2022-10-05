<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\AffiliateProduct;
use Config;

class AffilateController extends Controller
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

    public  function  index()
    {
        $affiliateProducts = AffiliateProduct::orderBy('created_at', 'DESC')->get();
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.affilateproduct.list', compact('affiliateProducts', 'type','status'));
    }

    public  function  create()
    {
        $categories = Category::all();
        $conditions = Config::get('constants.condition');
        return view('admin.affilateproduct.create', compact('categories', 'conditions'));
    } 
    //save affiliated products...
    public  function  store(Request $request)
    {
        $validate = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar' => 'required',
            'p_sku' => 'required',
            'plink' => 'required',
            'url_link' => 'required',
            'con' => 'required',
            'measure' => 'required',
            'p_size_qnty' => 'required',
            'p_size_price' => 'required',
            'p_ship_time' => 'required',
            'p_color' => 'required',
            'p_catog' => 'required',
            'p_sub_catog' => 'required',
            'p_new_price' => 'required',
            'p_old_price' => 'required',
            'p_stock' => 'required',
        ]);
        if(!$validate){
            return redirect()->back()->flash('message', 'something went wrong');
        }
        $product = new AffiliateProduct();
        $product->admin_id = Auth::guard('admin')->id();
        $product->a_type = $request->input('p_type');
        $product->a_name = $request->input('p_name');
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/products/', $filename, 'public');
            $product->a_image = $filename;

        }
        $product->a_sku = $request->input('p_sku');
        $product->plink = $request->input('plink');
        $product->url_link = $request->input('url_link');
        $product->con = $request->input('con');
        $product->measure = $request->input('measure');
        $product->a_size_qnty = $request->input('p_size_qnty');
        $product->a_size_price = $request->input('p_size_price');
        $product->a_ship_time = $request->input('p_ship_time');
        $product->a_color = $request->input('p_color');
        $product->a_catog = $request->input('p_catog');
        $product->a_sub_catog = $request->input('p_sub_catog');
        $product->a_child_catog = $request->input('p_child_catog');
        $product->a_new_price = $request->input('p_new_price');
        $product->a_old_price = $request->input('p_old_price');
        $product->a_stock = $request->input('p_stock');
        $product->a_detail = $request->input('p_detail');
        $product->a_r_policy = $request->input('p_r_policy');
        if($request->input('small') == true){
            $product->a_small = 1;
        }else{
            $product->a_small = 0;
        }
        if($request->input('medium') == true){
            $product->a_medium = 1;
        }else{
            $product->a_medium = 0;
        }
        if($request->input('large') == true){
            $product->a_large = 1;
        }else{
            $product->a_large = 0;
        }
        if($request->input('checkbox') == true){
            $product->a_status = 1;
        }else{
            $product->a_status = 0;
        }
        $product->save();
        return redirect()->route('admin.affilateproduct_list');

    }
    //end save...

    public  function  edit($id)
    {
        $product = AffiliateProduct::where('affiliate_products.id', $id )
                ->leftJoin('subcategories', 'a_sub_catog', '=', 'subcategories.id')
                ->leftJoin('childcategories', 'a_child_catog', '=', 'childcategories.id')
                ->select('affiliate_products.*', 'subcategories.name as sub_name', 'childcategories.name as child_name')
                ->first();
        $categories = Category::all();
        $type = Config::get('constants.type');
        $conditions = Config::get('constants.condition');
        return view('admin.affilateproduct.edit', compact('product', 'categories', 'type', 'conditions'));
        
    }

        // update ...
        public function update(Request $request, $id)
        {
           $validate = $request->validate([
                'p_sku' => 'required',
                'plink' => 'required',
                'url_link' => 'required',
                'con' => 'required',
                'measure' => 'required',
                'p_size_qnty' => 'required',
                'p_size_price' => 'required',
                'p_ship_time' => 'required',
                'p_color' => 'required',
                'p_catog' => 'required',
                'p_sub_catog' => 'required',
                'p_new_price' => 'required',
                'p_old_price' => 'required',
                'p_stock' => 'required',
            ]);
            if(!$validate){
                return redirect()->back()->flash('message', 'something went wrong');
            }
            $product = AffiliateProduct::where('id', $id)->first();
            if($request->hasfile('avatar'))
            {
                //new 
                $destination = 'storage/uploads/products/'.$product->p_image;
                if(File::exists($destination))
                    {
                        File::delete($destination);
                    }
                //end new
                $file = $request->file('avatar');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->storeAs('uploads/products/', $filename, 'public');
                $product->a_image = $filename;
    
            }
            $product->a_name = $request->input('p_name');
            $product->a_sku = $request->input('p_sku');
            $product->plink = $request->input('plink');
            $product->url_link = $request->input('url_link');
            $product->con = $request->input('con');
            $product->measure = $request->input('measure');
            $product->a_size_qnty = $request->input('p_size_qnty');
            $product->a_size_price = $request->input('p_size_price');
            $product->a_ship_time = $request->input('p_ship_time');
            $product->a_color = $request->input('p_color');
            $product->a_catog = $request->input('p_catog');
            $product->a_sub_catog = $request->input('p_sub_catog');
            $product->a_child_catog = $request->input('p_child_catog');
            $product->a_new_price = $request->input('p_new_price');
            $product->a_old_price = $request->input('p_old_price');
            $product->a_stock = $request->input('p_stock');
            $product->a_detail = $request->input('p_detail');
            $product->a_r_policy = $request->input('p_r_policy');
            if($request->input('small') == true){
                $product->a_small = 1;
            }else{
                $product->a_small = 0;
            }
            if($request->input('medium') == true){
                $product->a_medium = 1;
            }else{
                $product->a_medium = 0;
            }
            if($request->input('large') == true){
                $product->a_large = 1;
            }else{
                $product->a_large = 0;
            }
            if($product->a_status >= 1){
                if($request->input('active') == true){
                    $product->a_status = 3;
                }else{
                    $product->a_status = 2;
                }        }
            else{
                if($request->input('checkbox') == true){
                    $product->a_status = 1;
                }else{
                    $product->a_status = 0;
                }
            }
            $product->update();
            return redirect()->route('admin.affilateproduct_list');
        }
    
        public  function  view($id)
        {
            $product = AffiliateProduct::where('id', $id)->first();
            return view('admin.affilateproduct.view', compact('product'));
        }
        public function destroy($id)
        {
            $product = AffiliateProduct::where('id', $id)->first();
            $destination = 'storage/uploads/products/'.$product->p_image;
            if(File::exists($destination))
              {
                  File::delete($destination);
              }
            $product->delete();
            return response()->json(['success' => 'Record Has Been Deleted!..']);
        }
}
