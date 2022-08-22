<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public  function  index()
    {
        return view('admin.vendors.list');
    }

  
    public  function  edit()
    {
        return view('admin.vendors.edit');
    }
    
    public  function  view()
    {
        return view('admin.vendors.view');
    }


    public  function  question()
    {
        return view('admin.vendors.question');
    }

    public  function  list()
    {
        return view('admin.vendors.withdraw');
    }
}
