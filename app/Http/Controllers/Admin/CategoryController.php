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



}
