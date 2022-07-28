<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderViewController extends Controller
{
    public function index()
    {
        return view('user.order-view');
    }
}
