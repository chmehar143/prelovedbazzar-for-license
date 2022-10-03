<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorVerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    public  function  index()
    {
        $verified_Vendors = Vendor::where('status', 1)->get();
        return view('admin.vendorverification.list', compact('verified_Vendors'));
    }

    public  function  pending()
    {
        $verified_Vendors = Vendor::where('status', 0)->get();
        return view('admin.vendorverification.pending', compact('verified_Vendors'));
    }

}
