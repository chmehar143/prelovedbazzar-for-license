<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    public  function  index()
    {
        return view('admin.allproducts.list');
    }

    public  function  create()
    {
        return view('admin.allproducts.create');
    } 
    public  function  edit()
    {
        return view('admin.allproducts.edit');
    }
    
    public  function  view()
    {
        return view('admin.allproducts.view');
    }
}
