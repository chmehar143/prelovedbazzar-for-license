<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteBannerController extends Controller
{
    public  function  list()
    {
        return view('admin.webbanner.list');
    }

    public  function  create()
    {
        return view('admin.webbanner.create');
    }


    public  function  edit()
    {
        return view('admin.webbanner.edit');
    }   
}
