<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.Category.list');
    }

    public  function  create()
    {
        return view('admin.Category.create');
    }

    public  function  edit()
    {
        return view('admin.Category.edit');
    }

    public  function  view()
    {
        return view('admin.Category.view');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'unique:blog_categories',
            'slug' => 'unique:blog_categories'
        ];
        $customs = [
            'name.unique' => 'This name has already been taken.',
            'slug.unique' => 'This slug has already been taken.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new BlogCategory;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }


}
