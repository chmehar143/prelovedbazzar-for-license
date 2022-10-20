<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }


//      @foreach($shareData['categories'] as $category)
//    <li class="dropdown m-menu-fw">
//      <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ $category->name }}
//                              <span><i class="fa fa-angle-down"></i></span></a>


//                             <ul class="dropdown-menu" >
//                                <li>
//                                      <div class="m-menu-content" style="text-align: center;">
//                                        <ul class="col-sm-12" >
//                                             <li class="dropdown-header">{{ $category->name }}</li>

//                                              @foreach($category['subcategory'] as $subcategory)
//                                              <li><a href="{{ url('/subcategory') }}/{{ $subcategory->id }}">{{ $subcategory->name }}</a></li>
//                                            @endforeach
//                                          </ul>



//                                 </div>
//                                 </li>
//                              </ul>
//                          </li>

//  @endforeach
 }
