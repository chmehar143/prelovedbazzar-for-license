<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function create() {
        return view('vendor.setting.banner.list');
    }

}
