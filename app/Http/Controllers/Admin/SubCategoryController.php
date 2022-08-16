<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Redirect;
use Validator;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index() {
        $subCategories = Subcategory::get();
        return view('admin.subcategory.list',compact('subCategories'));
    }


    public  function  create()
    {
        $cats = Category::all();
        return view('admin.subcategory.create',compact('cats'));
    }


    //*** GET Request
    public function edit($id)
    {
        $cats = Category::all();
        $data = Subcategory::findOrFail($id);
        return view('admin.subcategory.edit',compact('data','cats'));
    }


    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'slug' => 'unique:subcategories|regex:/^[a-zA-Z0-9\s-]+$/'
        ];
        $customs = [
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Subcategory();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        return redirect()->route('admin.sub_category_list');
        //--- Redirect Section Ends
    }

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'slug' => 'unique:subcategories,slug,'.$id.'|regex:/^[a-zA-Z0-9\s-]+$/'
        ];
        $customs = [
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = Subcategory::findOrFail($id);
        $input = $request->all();
        $input['status'] = (isset($request->status) && $request->status == 1)? 1 : 0;
        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        return redirect()->route('admin.sub_category_list');
        //--- Redirect Section Ends
    }

    public  function  destroy($id){
        Subcategory::where('id',$id)->delete();
        return redirect()->back();
    }
}
