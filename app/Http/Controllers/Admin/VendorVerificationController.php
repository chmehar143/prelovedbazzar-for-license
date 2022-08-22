<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorVerificationController extends Controller
{
    public  function  index()
    {
        return view('admin.vendorverification.list');
    }

  
    public  function  pending()
    {
        return view('admin.vendorverification.pending');
    }
    
  


}
