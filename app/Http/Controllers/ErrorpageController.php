<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorpageController extends Controller
{
    public function index()
    {
        return view('user.404-error');
    }
}
