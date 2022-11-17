<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, File, DB, Redirect};
use App\Models\{Product, Category, Subcategory, Childcategory, Gallery};
use Validator;
use Config;

class AllProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public  function  index()
    {
        $products = Product::whereNotNull('admin_id')->orderBy('created_at', 'DESC')->get();
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.allproducts.list', compact('products', 'status', 'type'));
    }

    public  function  create()
    {
        $categories = Category::all();
        $conditions = Config::get('constants.condition');
        return view('admin.allproducts.create', compact('categories', 'conditions'));
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
    // end ajax function

    public  function  store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'p_name' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'gallery' => 'required',
            'p_sku' => 'required|unique:products|',
            'con' => 'required',
            'p_ship_time' => 'required',
            'p_color' => 'required',
            'p_catog' => 'required',
            'p_sub_catog' => 'required',
            'p_new_price' => 'required|numeric',
            'p_old_price' => 'required|numeric',
            'p_detail' => 'max:255',
            'p_stock' => 'required|integer|min:0',

       ];
       $customs = [
            'p_catog.required' => 'category field is required',
            'p_sub_catog.required' => 'Subcategory field is required',
            'avatar.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'avatar.max' => 'Fil size must be less than 2MB.',
            'p_new_price.numeric' => 'Numeric value accepted only.',
            'p_old_price.numeric' => 'Numeric value accepted only.'
       ];
       $validator = Validator::make($request->all(), $rules, $customs);

       if($validator->fails()) {
           return Redirect::back()->withErrors($validator);
       }
       //end validation

// Store new product
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
        $product->con = $request->input('con');
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

        if($request->hasfile('gallery'))
        {
            $i = 1;
            foreach($request->file('gallery') as $image)
            {
                $ext = $image->getClientOriginalExtension();
                $galleryname = time().$i++.'.'.$ext;
                $image->storeAs('uploads/gallery', $galleryname, 'public');
                $product->gallery()->create([
                    'product_id'=> $product->id,
                    'image'=> $galleryname
                ]);
            }

        }
        return redirect()->route('admin.allproducts_list')->with('message', 'Product added successfully');

    }

    //next function.. 
    public  function  edit($id)
    {
        $categories = Category::all();
        $product = Product::where('products.id', $id)
                    ->leftJoin('subcategories', 'p_sub_catog', '=', 'subcategories.id')
                    ->leftJoin('childcategories', 'p_child_catog', '=', 'childcategories.id')
                    ->select('products.*', 'subcategories.name as sub_name', 'childcategories.name as child_name')
                    ->first();
        $conditions = Config::get('constants.condition');
        return view('admin.allproducts.edit', compact('product','categories', 'conditions'));
    } 
    
    //Update products...
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
            'p_new_price' => 'required|numeric',
            'p_old_price' => 'required|numeric',
            'p_stock' => 'required|integer|min:0',
            'p_detail' => 'max:255',

       ];
       $customs = [
            'p_catog.required' => 'category field is required',
            'p_sub_catog.required' => 'Subcategory field is required',
            'avatar.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'avatar.max' => 'Fil size must be less than 2MB.',
            'p_new_price.numeric' => 'Numeric value accepted only.',
            'p_old_price.numeric' => 'Numeric value accepted only.'
       ];
       $validator = Validator::make($request->all(), $rules, $customs);

       if($validator->fails()) {
           return Redirect::back()->withErrors($validator);
       }
       //end validation

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
        $product->con = $request->input('con');
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

        if($request->hasfile('gallery'))
        {
            $i = 1;
            foreach($request->file('gallery') as $image)
            {
                //delete old images
                // $destination = 'storage/uploads/gallery/'.$product->gallery->image;
                // if(File::exists($destination))
                // {
                //     File::delete($destination);
                // }
                // //end

                $ext = $image->getClientOriginalExtension();
                $galleryname = time().$i++.'.'.$ext;
                $image->storeAs('uploads/gallery', $galleryname, 'public');
                $product->gallery()->create([
                    'product_id'=> $product->id,
                    'image'=> $galleryname
                ]);
            }

        }

        $product->update();

        return redirect()->route('admin.allproducts_list')->with('message', 'Product updated successfully');

    }
    //end update
    public  function  view($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::where('id', $product->p_catog)->first();   
        $subcategory = Subcategory::where('id', $product->p_sub_catog)->first();   
        $childcategory = ChildCategory::where('id', $product->p_child_catog)->first();   
        return view('admin.allproducts.view', compact('product', 'category', 'subcategory', 'childcategory'));
    }

    //delete product from stores...
    public function destroy($id)
    {
         $product = Product::where('id', $id)->first();
         $destination = 'storage/uploads/products/'.$product->p_image;
         if(File::exists($destination))
           {
               File::delete($destination);
           }
         $product->delete();
         return response()->json(['success' => 'Record Has Been Deleted!..']);
    }

    public function removegallery($id)
    {
         $gallery = Gallery::where('id', $id)->first();
         $destination = 'storage/uploads/gallery/'.$gallery->image;
         if(File::exists($destination))
           {
               File::delete($destination);
           }
         $gallery->delete();
         return response()->json(['success' => 'Record Has Been Deleted!..']);
    }
}
