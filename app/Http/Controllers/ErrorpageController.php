<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorpageController extends Controller
{
    public function index()
    {
        return view('fronted-views.404-error');
    }
}
