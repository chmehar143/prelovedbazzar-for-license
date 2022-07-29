<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    public function index() {
        return view('admin.ChildCategory.list');
    }

    public  function  create()
    {
        return view('admin.ChildCategory.create');
    }

    public  function  edit()
    {
        return view('admin.ChildCategory.edit');
    }

    public  function  view()
    {
        return view('admin.ChildCategory.view');
    }
}
