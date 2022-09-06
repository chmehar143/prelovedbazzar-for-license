<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index() {
        return view('vendor.setting.shipping.list');
    }

    public function create() {
        return view('vendor.setting.shipping.create');
    }

    public function edit() {
        return view('vendor.setting.shipping.edit');
    }

    public function view() {
        return view('vendor.setting.shipping.view');
    }

}