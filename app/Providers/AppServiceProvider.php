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
         $user = Auth::guard('user')->user();
         if(Auth::guard('user')->check()){
           $user = Auth::guard('user');
             $carts = Cart::where('user_id', $user->id())
            ->join('products','carts.prod_id', '=', 'products.id')
            ->get();
        }
 else{
             $session = Session::getId();
            $carts = Cart::where('session_id', $session)
            ->join('products','carts.prod_id', '=', 'products.id')
            ->get();
         }
         $categories = Category::where('status',1)->get(); 
         $subcategories = Subcategory::where('status',1)->get();
             $shareData = array( 
             'categories'=>$categories,
             'subcategories'=>$subcategories,
             'user' => $user,
            'carts' => $carts
            );

         view()->share('shareData',$shareData);
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
