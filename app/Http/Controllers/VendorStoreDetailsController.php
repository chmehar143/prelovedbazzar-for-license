<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorStoreDetailsController extends Controller
{
    public function index($id)
    {
        return view('user.vendor-store-details');
    }
}
