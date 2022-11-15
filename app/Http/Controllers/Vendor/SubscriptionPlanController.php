<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index() {
        return view('vendor.subscriptionplan.list');
    }

    public function create() {
        return view('vendor.subscriptionplan.create');
    }

    public function view() {
        return view('vendor.subscriptionplan.view');
    }
}
