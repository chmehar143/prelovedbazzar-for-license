<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeactivedProductController extends Controller
{
    public  function  index()
    {
        return view('admin.deactivateproduct.list');
    }
}
