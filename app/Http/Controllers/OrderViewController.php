<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderViewController extends Controller
{
    public function index()
    {
        return view('fronted-views.order-view');
    }
}
