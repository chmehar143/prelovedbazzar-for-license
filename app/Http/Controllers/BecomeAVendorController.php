<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecomeAVendorController extends Controller
{
    public function index()
    {
        return view('user.become-a-vendor');
    }
}
