<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackagingController extends Controller
{
    public function index() {
        return view('vendor.setting.packgings.list');
    }

    public function create() {
        return view('vendor.setting.packgings.create');
    }

    public function edit() {
        return view('vendor.setting.packgings.edit');
    }

    public function view() {
        return view('vendor.setting.packgings.view');
    }
}
