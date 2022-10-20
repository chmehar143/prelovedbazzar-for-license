<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
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
    public function index() {
        return view('vendor.withdraw.list');
    }

    public function create() {
        return view('vendor.withdraw.create');
    }

    public function edit() {
        return view('vendor.withdraw.edit');
    }

    public function view() {
        return view('vendor.withdraw.view');
    }

}
