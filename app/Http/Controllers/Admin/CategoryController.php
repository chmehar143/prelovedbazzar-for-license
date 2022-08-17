<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

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
            'slug' => 'unique:categories|regex:/^[a-zA-Z0-9\s-]+$/',
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
        return redirect()->route('admin.Category_list');

    }

}
