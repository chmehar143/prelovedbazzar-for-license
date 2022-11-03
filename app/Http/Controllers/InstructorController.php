<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        return view('how-to-become-a-vendor');
    }
}
