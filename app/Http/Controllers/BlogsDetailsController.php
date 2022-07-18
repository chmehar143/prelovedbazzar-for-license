<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsDetailsController extends Controller
{
    public function index()
    {
        return view('fronted-views.blog-details');
    }
}
