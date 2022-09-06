<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingServiceController extends Controller
{
    public function index() {
        return view('vendor.setting.service.list');
    }

    public function create() {
        return view('vendor.setting.service.create');
    }

    public function edit() {
        return view('vendor.setting.service.edit');
    }

    public function view() {
        return view('vendor.setting.service.view');
    }

    public function list() {
        return view('vendor.setting.banner.list');
    }
}
