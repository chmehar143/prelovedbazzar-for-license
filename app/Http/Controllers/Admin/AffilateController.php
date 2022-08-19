<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffilateController extends Controller
{
    public  function  index()
    {
        return view('admin.affilateproduct.list');
    }

    public  function  create()
    {
        return view('admin.affilateproduct.create');
    } 
    public  function  edit()
    {
        return view('admin.affilateproduct.edit');
    }
    
    public  function  view()
    {
        return view('admin.affilateproduct.view');
    }
}
