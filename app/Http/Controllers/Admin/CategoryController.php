<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index() {
        $categories = Category::get();
        return view('admin.category.list',compact('categories'));
    }

    public  function  create()
    {
        return view('admin.category.create');
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit',compact('data'));
    }


    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'slug' => 'unique:categories|regex:/^[a-zA-Z0-9\s-]+$/',
            'name' => 'required',
        ];
        $customs = [
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $data = new Category();
        $input = $request->all();
        $data->fill($input)->save();
        return redirect()->route('admin.category_list');

    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        //--- Validation Section
        $rules = [
            'slug' => 'unique:categories,slug,'.$id.'|regex:/^[a-zA-Z0-9\s-]+$/'
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
        $data = Category::findOrFail($id);
        $input = $request->all();
        $input['status'] = (isset($request->status) && $request->status == 1)? 1 : 0;
        $data->update($input);
        //--- Logic Section Ends
        return redirect()->route('admin.category_list');
        //--- Redirect Section Ends
    }

    public  function  destroy($id){
        Category::where('id',$id)->delete();
        return redirect()->back();
    }

}
