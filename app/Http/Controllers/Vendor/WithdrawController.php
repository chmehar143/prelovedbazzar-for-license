<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
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
