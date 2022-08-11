<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index() {
        return view('vendor.Setting.Shipping.list');
    }

    public function create() {
        return view('vendor.Setting.Shipping.create');
    }

    public function edit() {
        return view('vendor.Setting.Shipping.edit');
    }

    public function view() {
        return view('vendor.Setting.Shipping.view');
    }

}
