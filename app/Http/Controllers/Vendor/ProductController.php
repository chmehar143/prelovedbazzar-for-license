<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vendor.auth:vendor');
    }

    /**
     * Show the Vendor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        //return view('vendor.product.list');
    }
}
