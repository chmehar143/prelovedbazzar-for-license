<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingServiceController extends Controller
{
    public function index() {
        return view('vendor.Setting.Service.list');
    }

    public function create() {
        return view('vendor.Setting.Service.create');
    }

    public function edit() {
        return view('vendor.Setting.Service.edit');
    }

    public function view() {
        return view('vendor.Setting.Service.view');
    }

    public function list() {
        return view('vendor.Setting.banner.list');
    }
}
