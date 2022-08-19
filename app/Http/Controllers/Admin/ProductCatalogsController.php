<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCatalogsController extends Controller
{
    public  function  index()
    {
        return view('admin.productcatalog.list');
    }

    public  function  create()
    {
        return view('admin.productcatalog.create');
    } 
    public  function  edit()
    {
        return view('admin.productcatalog.edit');
    }
    
    public  function  view()
    {
        return view('admin.productcatalog.view');
    }
}
