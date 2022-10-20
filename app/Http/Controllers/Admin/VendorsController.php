<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use App\Models\Withdraw;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\AffiliateProduct;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Config;

class VendorsController extends Controller
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
        $vendors = Vendor::all();
        return view('admin.vendors.list', compact('vendors'));
    }

  
    public  function  edit($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        return view('admin.vendors.edit', compact('vendor'));
    }

    public  function  update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'shop_name' => 'required',

       ];
       $validator = Validator::make($request->all(), $rules);
       if($validator->fails()) {
           return Redirect::back()->withErrors($validator);
       }
       //end validation
        $vendor = Vendor::where('id', $id)->first();
        $vendor->email = $request->input('email');
        $vendor->shop_name = $request->input('shop_name');
        $vendor->shop_detail = $request->input('shop_detail'); // not required
        $vendor->name = $request->input('name');
        $vendor->address = $request->input('address');  // not required
        $vendor->reg_no = $request->input('reg_no');  //registration not required..
        $vendor->message = $request->input('message'); // not required...
        $vendor->update();
        return redirect()->route('admin.vendors_list');
    }
    
    public  function  view($id)
    {
        $vendor = Vendor::where('id', $id)->first();
        $products = Product::where('vendor_id', $id)->get();
        $total_added = $products->count();        
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.vendors.view', compact('vendor', 'products','total_added','status','type'));
    }
    
    public  function  question()
    {
        return view('admin.vendors.question');
    }

    public  function  list()
    {
        $withdraws = Withdraw::all();
        return view('admin.vendors.withdraw', compact('withdraws'));
    }
}
