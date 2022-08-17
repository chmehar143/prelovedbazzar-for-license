<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffilateProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vendor.auth:vendor');
    }

    /**
     * Show the Vendor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('vendor.affilateproduct.list');
    }

    public  function  create()
    {
        return view('vendor.affilateproduct.create');
    }

    public  function  edit()
    {
        return view('vendor.affilateproduct.edit');
    }

    public  function  view()
    {
        return view('vendor.affilateproduct.view');
    }


}
