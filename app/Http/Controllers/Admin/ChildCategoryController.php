<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class ChildCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index() {
        return view('admin.childcategory.list');
    }

    public  function  create()
    {
        $cats = Subcategory::all();
        return view('admin.childcategory.create',compact('cats'));
    }
    public  function  edit()
    {
        return view('admin.childcategory.edit');
    }

    public  function  view()
    {
        return view('admin.childcategory.view');
    }
}
