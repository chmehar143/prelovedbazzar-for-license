<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageStaffController extends Controller
{
    public  function  list()
    {
        return view('admin.managestaff.list');
    }

    public  function  create()
    {
        return view('admin.managestaff.create');
    } 
    public  function  edit()
    {
        return view('admin.managestaff.edit');
    }
    
    public  function  view()
    {
        return view('admin.managestaff.view');
    }
}
