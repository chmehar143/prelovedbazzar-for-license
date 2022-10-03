<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageRolesController extends Controller
{
    public  function  list()
    {
        return view('admin.manageroles.list');
    }

    public  function  create()
    {
        return view('admin.manageroles.create');
    } 
    public  function  edit()
    {
        return view('admin.manageroles.edit');
    }
    
   
}
