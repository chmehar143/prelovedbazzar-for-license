<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BulkProductController extends Controller
{
    public function index() {
        return view('vendor.BulkProduct.home');
    }
}
