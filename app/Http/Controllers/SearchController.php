<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Product};

class SearchController extends Controller
{
    public function search()
    {
        return view('user.shop');
    }
}
