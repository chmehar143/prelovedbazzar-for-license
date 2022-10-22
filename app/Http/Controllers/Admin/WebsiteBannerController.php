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
use App\Models\Banner;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Config;

class WebsiteBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public  function  list()
    {
        $banners = Banner::all();
        $status = Config::get('constants.status');
        return view('admin.webbanner.list', compact('banners', 'status'));
    }

    public  function  create()
    {
        return view('admin.webbanner.create');
    }

    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'offer' => 'required',
            'url' => 'required'
        ];
        $customs = [
            'image.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'image.max' => 'Fil size must be less than 2MB.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $input = $request->all();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/Web_banners/', $filename, 'public');
            $input['image'] = $filename;
        }
        Banner::create($input);
        return redirect()->route('admin.webbanner_list');
    }


    public  function  edit($id)
    {
        $banner= Banner::where('id', $id)->first();
        return view('admin.webbanner.edit', compact('banner'));
    } 
    
    public function update(Request $request, $id)
    {
        $banner = Banner::where('id', $id)->first();

        //--- Validation Section
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'offer' => 'required',
            'url' => 'required'
        ];
        $customs = [
            'image.mimes' => 'File must be with extension jpeg,png,jpg,gif or svg.',
            'image.max' => 'Fil size must be less than 2MB.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $input = $request->all();
        if($request->hasfile('image'))
        {
            //new 
            $destination = 'storage/uploads/Web_banners/'.$banner->image;
            if(File::exists($destination))
                {
                    File::delete($destination);
                }
            //end new
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->storeAs('uploads/Web_banners/', $filename, 'public');
            $input['image'] = $filename;
        }
        $input['status'] = (isset($request->status) && $request->status == 1)? 1 : 0;
        $banner->update($input);

        return redirect()->route('admin.webbanner_list');
    }

    //delete banner from stores...
    public function remove($id)
    {
            $banner = Banner::where('id', $id)->first();
            $destination = 'storage/uploads/Web_banners/'.$banner->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $banner->delete();
            return response()->json(['success' => 'Banner Has Been Deleted!..']);
    }
}
