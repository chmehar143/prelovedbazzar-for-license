<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDisscussionController extends Controller
{
    public  function  comments()
    {
        return view('admin.productdisscussion.comments');
    }

    public  function  report()
    {
        return view('admin.productdisscussion.report');
    }


    public  function  review()
    {
        return view('admin.productdisscussion.review');
    } 

    public  function  reviewview()
    {
        return view('admin.productdisscussion.reviewview');
    } 
}
