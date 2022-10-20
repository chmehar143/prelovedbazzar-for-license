<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public  function  index()
    {
        return view('admin.blog.categorieslist');
    }

    public  function  create()
    {
        return view('admin.blog.addcategories');
    } 
    public  function  edit()
    {
        return view('admin.blog.editcategories');
    }



    public  function  post()
    {
        return view('admin.blog.postlist');
    }

    public  function  postcreate()
    {
        return view('admin.blog.addpost');
    } 
    public  function  postedit()
    {
        return view('admin.blog.editpost');
    }
}
