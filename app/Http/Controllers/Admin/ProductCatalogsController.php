<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Config;

class ProductCatalogsController extends Controller
{    /**
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
        $products = Product::orderBy('created_at', 'DESC')->get();
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.productcatalog.list', compact('products', 'status', 'type'));
    }

    public  function  create()
    {
        $categories = Category::all();
        return view('admin.productcatalog.create', compact('categories'));
    }
    
    //some ajax functions are here...

    public function GetSubCat(Request $request){
        $cid=$request->post('cid');
        $subcats=SubCategory::where('category_id',$cid)->orderBy('name','asc')->get();
            $html='<option value="">Select State</option>';
        foreach($subcats as $list){
                $html.='<option data-kt-flag="flags/indonesia.svg" value="'.$list->id.'">'.$list->name.'</option>';
            }
            echo $html;
        
    }

    public function GetChildCat(Request $request){
        $sid=$request->post('sid');
        $childcats=Childcategory::where('subcategory_id',$sid)->orderBy('name','asc')->get();
            $html='<option value="">Select State</option>';
        foreach($childcats as $list){
                $html.='<option data-kt-flag="flags/indonesia.svg" value="'.$list->id.'">'.$list->name.'</option>';
            }
            echo $html;
        
    }
    // Store new product

    public  function  store(Request $request)
    {
        $product = new Product();
        $product->admin_id = Auth::guard('admin')->id();
        $product->p_type = $request->input('p_type');
        $product->p_name = $request->input('p_name');
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/products/', $filename, 'public');
            $product->p_image = $filename;

        }
        $product->p_sku = $request->input('p_sku');
        $product->p_size_qnty = $request->input('p_size_qnty');
        $product->p_size_price = $request->input('p_size_price');
        $product->p_ship_time = $request->input('p_ship_time');
        $product->p_color = $request->input('p_color');
        $product->p_catog = $request->input('p_catog');
        $product->p_sub_catog = $request->input('p_sub_catog');
        $product->p_child_catog = $request->input('p_child_catog');
        $product->p_new_price = $request->input('p_new_price');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_stock = $request->input('p_stock');
        $product->p_detail = $request->input('p_detail');
        $product->p_r_policy = $request->input('p_r_policy');
        if($request->input('small') == true){
            $product->small = 1;
        }else{
            $product->small = 0;
        }
        if($request->input('medium') == true){
            $product->medium = 1;
        }else{
            $product->medium = 0;
        }
        if($request->input('large') == true){
            $product->large = 1;
        }else{
            $product->large = 0;
        }
        if($request->input('checkbox') == true){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        $product->save(); 
        return redirect()->route('admin.productcatalog_list');
    }

    public  function  edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $childcategories = Childcategory::all();
        $product = Product::where('id', $id)->first();
        return view('admin.productcatalog.edit', compact('product','categories','subcategories','childcategories'));
    }

    //Update products...
    public  function  update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->p_name = $request->input('p_name');
        if($request->hasfile('avatar') != '')
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
            $product->p_image = $filename;

        }
        $product->p_sku = $request->input('p_sku');
        $product->p_size_qnty = $request->input('p_size_qnty');
        $product->p_size_price = $request->input('p_size_price');
        $product->p_ship_time = $request->input('p_ship_time');
        $product->p_color = $request->input('p_color');
        $product->p_catog = $request->input('p_catog');
        $product->p_sub_catog = $request->input('p_sub_catog');
        $product->p_child_catog = $request->input('p_child_catog');
        $product->p_new_price = $request->input('p_new_price');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_stock = $request->input('p_stock');
        $product->p_detail = $request->input('p_detail');
        $product->p_r_policy = $request->input('p_r_policy');
        if($request->input('small') == true){
            $product->small = 1;
        }else{
            $product->small = 0;
        }
        if($request->input('medium') == true){
            $product->medium = 1;
        }else{
            $product->medium = 0;
        }
        if($request->input('large') == true){
            $product->large = 1;
        }else{
            $product->large = 0;
        }
        if($request->input('checkbox') == true){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        $product->update();
        return redirect()->route('admin.productcatalog_list');

    }
    //end update
    
    public  function  view($id)
    {
        $product = Product::where('id', $id)->first();   
        return view('admin.productcatalog.view', compact('product'));
    }
}
