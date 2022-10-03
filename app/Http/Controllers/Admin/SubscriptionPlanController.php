<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public  function  index()
    {
        return view('admin.subscriptionplan.list');
    }

    public  function  create()
    {
        return view('admin.subscriptionplan.create');
    }

    public  function  edit()
    {
        return view('admin.subscriptionplan.edit');
    }

    public  function  view()
    {
        return view('admin.subscriptionplan.view');
    }
}
