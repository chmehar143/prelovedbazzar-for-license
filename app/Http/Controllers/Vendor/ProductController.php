<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Product, Category, Subcategory, Childcategory};
use Validator;
use Config;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vendor.auth:vendor');
    }

    /**
     * Show the Vendor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $vendor = Auth::guard('vendor');
        $products = Product::where('vendor_id', $vendor->id())->get();
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('vendor.product.list', compact('products', 'status', 'type'));
    }

    public  function  create()
    {
        $categories = Category::all();
        $conditions = Config::get('constants.condition');
        return view('vendor.product.create', compact('categories', 'conditions'));
    }


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


    public  function  store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'p_name' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'p_sku' => 'required|unique:products|',
            'con' => 'required',
            'p_ship_time' => 'required',
            'p_color' => 'required',
            'p_catog' => 'required',
            'p_sub_catog' => 'required',
            'p_new_price' => 'required',
            'p_old_price' => 'required',
            'p_stock' => 'required',

        ];
        $customs = [
            'avatar.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'avatar.max' => 'Fil size must be less than 2MB.',
            'p_sku.unique' => 'This SKU has already been taken.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //end validation
        $product = new Product();
        $product->vendor_id = Auth::guard('vendor')->id();
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
        $product->status = 1;
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
        $product->save();
        return redirect()->route('vendor.product_list');

    }

    public  function  edit($id)

    {
        $categories = Category::all();
        $product = Product::where('products.id', $id)->where('vendor_id', Auth::guard('vendor')->id())
                    ->leftJoin('subcategories', 'p_sub_catog', '=', 'subcategories.id')
                    ->leftJoin('childcategories', 'p_child_catog', '=', 'childcategories.id')
                    ->select('products.*', 'subcategories.name as sub_name', 'childcategories.name as child_name')
                    ->first(); 
        $conditions = Config::get('constants.condition');  
        return view('vendor.product.edit', compact('product','categories','conditions'));
    }


    public  function  update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'p_name' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'p_sku' => 'required',
            'con' => 'required',
            'p_ship_time' => 'required',
            'p_color' => 'required',
            'p_catog' => 'required',
            'p_sub_catog' => 'required',
            'p_new_price' => 'required',
            'p_old_price' => 'required',
            'p_stock' => 'required',

        ];
        $customs = [
            'avatar.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'avatar.max' => 'Fil size must be less than 2MB.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //end validation

        $product = Product::where('id', $id)->where('vendor_id', Auth::guard('vendor')->id())->first();
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
        return redirect()->route('vendor.product_list');

    }

    public  function  view($id)
    {
        $product = Product::where('id', $id)->where('vendor_id', Auth::guard('vendor')->id())->first();   
        return view('vendor.product.view', compact('product'));
    }
    public function destroy($id)
    {
         $product = Product::where('id', $id)->where('vendor_id', Auth::guard('vendor')->id())->first();
         $destination = 'storage/uploads/products/'.$product->p_image;
         if(File::exists($destination))
           {
               File::delete($destination);
           }
         $product->delete();
         return response()->json(['success' => 'Record Has Been Deleted!..']);
    }

    

}
