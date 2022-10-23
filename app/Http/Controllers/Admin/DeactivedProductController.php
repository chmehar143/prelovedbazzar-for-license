<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Config;

class DeactivedProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public  function  index()
    {
        $products = Product::where('status', 0)->orderBy('created_at', 'DESC')->get();
        $status = Config::get('constants.status');
        $type = Config::get('constants.type');
        return view('admin.deactivateproduct.list', compact('products', 'status', 'type'));
    }
}
