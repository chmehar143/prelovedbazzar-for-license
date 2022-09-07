<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index(){
        $vendors = Vendor::all();
        return view('admin.vendors.index', compact('vendors'));
    }
}
