<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index() {
        return view('vendor.Withdraw.home');
    }

    public function create() {
        return view('vendor.Withdraw.create');
    }

    public function edit() {
        return view('vendor.Withdraw.edit');
    }

    public function view() {
        return view('vendor.Withdraw.view');
    }

}
