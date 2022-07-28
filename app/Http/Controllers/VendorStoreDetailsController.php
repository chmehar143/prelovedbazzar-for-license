<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorStoreDetailsController extends Controller
{
    public function index()
    {
        return view('user.vendor-store-details');
    }
}
