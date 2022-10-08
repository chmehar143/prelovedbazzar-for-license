<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public  function  list()
    {
        return view('admin.contactus.list');
    }

    public  function  view()
    {
        return view('admin.contactus.view');
    }

}
