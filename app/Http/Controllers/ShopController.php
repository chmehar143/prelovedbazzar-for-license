<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Category, Vendor, Childcategory, Subcategory, Discussion, User};
class ShopController extends Controller
{
    public function index()
    {

        return view('user.shop');
    }

    public function sortby()
    {
        return view('user.sort-by-cat');
    }

    public function subcat()
    {

        return view('user.sort-by-subcat');
    }

    public function sort_price()
    {
            
        return view('user.sort-by-price');
    }

}
