<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TotalWithdrawController extends Controller
{
    public function list() {
        return view('vendor.totalwithdraw.list');
    }
}
