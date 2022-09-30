<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
     public  function  index()
    {
        return view('admin.customer.list');
    }

    public  function  deposit()
    {
        return view('admin.customer.deposit');
    }


    public  function  withdraw()
    {
        return view('admin.customer.withdraw');
    } 


    public  function  transactions()
    {
        return view('admin.customer.transaction');
    }
    
    public  function  view()
    {
        return view('admin.customer.viewdetails');
    }
    public  function  edit()
    {
        return view('admin.customer.edit');
    }

    public  function  details()
    {
        return view('admin.customer.details');
    }

    public  function  invoice()
    {
        return view('admin.customer.invoice');
    }
}
