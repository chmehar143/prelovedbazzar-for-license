<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
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

    
    public  function  message()
    {
        return view('admin.message.messagelist');
    }

    public  function  messageview()
    {
        return view('admin.message.messagelist_view');
    }

    public  function  view()
    {
        return view('admin.message.view');
    }

    public  function  details()
    {
        return view('admin.message.details');
    }

    public  function  invoice()
    {
        return view('admin.message.invoice');
    }
}
