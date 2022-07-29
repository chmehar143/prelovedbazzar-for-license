<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
        return view('admin.SubCategory.list');
    }

    public  function  create()
    {
        return view('admin.SubCategory.create');
    }

    public  function  edit()
    {
        return view('admin.SubCategory.edit');
    }

    public  function  view()
    {
        return view('admin.SubCategory.view');
    }
}
