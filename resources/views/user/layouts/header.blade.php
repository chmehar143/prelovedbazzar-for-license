<?php
use Illuminate\Support\Facades\URL;

?>

<header class="header">
   <div class="header-top">
      <div class="container">
         <div class="header-left">
            <p class="welcome-msg">Welcome to  Bazaar!</p>
            <p class="welcome-msg"></p>
         </div>
         <div class="header-right">
            <!-- <div class="dropdown ">
               <a href="#currency">USD</a>
               <div class="dropdown-box">
                   <a href="#USD">USD</a>
                   <a href="#EUR">EUR</a>
               </div>
               </div> -->
            <!-- End of DropDown Menu -->
            <!-- <div class="dropdown">
               <a href="#language"><img src="{{asset('frontend-assets/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14"
                       height="8" class="dropdown-image" /> ENG</a>
               <div class="dropdown-box">
                   <a href="#ENG">
                       <img src="{{asset('frontend-assets/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14" height="8"
                           class="dropdown-image" />
                       ENG
                   </a>
                   <a href="#FRA">
                       <img src="{{asset('frontend-assets/assets/images/flags/fra.png')}}" alt="FRA Flag" width="14" height="8"
                           class="dropdown-image" />
                       FRA
                   </a>
               </div>
               </div> -->
            <!-- End of Dropdown Menu -->
            <span class="divider d-lg-show"></span>
            <!-- <a href="{{route('blogs')}}" class="d-lg-show">Blog</a> -->
            <!-- <a href="{{route('contact-us')}}" class="d-lg-show">Contact Us</a> -->

            @if(Auth::guard('user')->check() )
               <a href="{{route('my-account')}}" class="d-lg-show"><i class="w-icon-account"></i> Hi {{Auth::guard('user')->user()->name}}!</a>
               <a href="{{route('my-account')}}" class="d-lg-show">My Account</a>
               <a href="{{route('user.logout')}}" class="d-lg-show">Logout</a>
             @else
               <a href="{{route('user.login')}}" class="d-lg-show"><i class="w-icon-account"></i>Sign In</a>
               <span class="delimiter  d-lg-show">/</span>
               <a href="{{route('user.login')}}#sign-up" class="ml-0 d-lg-show ">Register</a>
            @endif
         </div>
      </div>
   </div>
   <!-- End of Header Top -->
   <div class="header-middle">
      <div class="container">
         <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="#" class="logo ml-lg-0">
               <img src="{{asset('frontend-assets/assets/images/logo.png')}}" alt="logo" width="144" height="45" />
            </a>
            <form method="get" action="{{route('search_product')}}"
               class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
               <input type="text" class="form-control" name="search" value="{{ Request::get('search') }}" id="search" placeholder="Search in..."
                  required />
               <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
               </button>
            </form>
         </div>
         <div class="header-right ml-4">
            <div class="header-call d-xs-show d-lg-flex align-items-center">
               <a href="tel:#" class="w-icon-call"></a>
               <div class="call-info d-lg-show">
                  <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                     <a href="mailto:#" class="text-capitalize">Live Chat</a> or :
                  </h4>
                  <a href="tel:1-800-570-7777" class="phone-number font-weight-bolder ls-50">1-800-570-7777</a>
               </div>
            </div>
            <div class="dropdown cart-dropdown mr-0 mr-lg-5">
               <div class="cart-overlay"></div>
               <a href="{{route('wishlist')}}" class="cart-toggle label-down link">
               <i class="w-icon-heart">
               <span class="cart-count">@livewire('userend.wishlist.wish-item-count')</span>
               </i>
               <span class="cart-label">Wishlist</span>
               </a>
            </div>
            <div class="dropdown cart-dropdown mr-0 mr-lg-2">
               <div class="cart-overlay"></div>
               <a href="{{route('cart')}}" class="cart-toggle label-down link">
               <i class="w-icon-cart">
               <span class="cart-count">@livewire('userend.products.product-count')</span>
               </i>
               <span class="cart-label">Cart</span>
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- End of Header Middle -->
   <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
      <div class="container">
         <div class="inner-wrap">
            <div class="header-left">
               <div class="dropdown category-dropdown has-border" data-visible="true">
                  <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="true" data-display="static"
                     title="Browse Categories">
                  <i class="w-icon-category"></i>
                  <span>Browse Categories</span>
                  </a>
                  <div class="dropdown-box">
                     <ul class="menu vertical-menu category-menu">
                        @foreach($shareData['categories'] as $category)
                        <li>
                           <a href="{{ route('sortby',$category->id ) }}">
                           {{$category->name}}
                           </a>
                           @if($category['subcategory']->count() > 0)
                           <ul class="">
                              @forelse($category['subcategory'] as $subcategory)
                              <li><a href="{{ route('subcat',$subcategory->id ) }}">{{$subcategory->name}}</a></li>
                              @empty
                              <li style="display: none;"></li>
                              @endforelse
                           </ul>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <nav class="main-nav">
                  <ul class="menu active-underline">

                     <li class=" @if(Request::segment(1) == '') active @endif">
                        <a href="{{route('index')}}">Home</a>
                     </li>
                     <li class=" @if(Request::segment(1) == 'shop') active @endif">
                        <a href="{{ route('shop') }}">Shop</a>
                     </li>
                     <li class=" @if(Request::segment(1) == 'vendor-store') active @endif">
                        <a href="{{route('vendor-store')}}">Vendor Stores</a>
                     </li>
                     <!-- <li>
                        <a href="{{route('about-us')}}">About Us</a>

                        </li> -->


                     <li><a href="{{route('vendor.register')}}">Become A Vendor</a></li>

                     <li class=" @if(Request::segment(1) == 'about-us') active @endif">
                           <a href="{{route('about-us')}}">About Us</a>
                      </li>

                      <li class=" @if(Request::segment(1) == 'contact-us') active @endif">
                 <a href="{{route('contact-us')}}" >Contact Us</a>

                  </li>
                  </ul>
               </nav>
            </div>
            <!-- <div class="header-right">
               <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
               <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
               </div> -->
         </div>
      </div>
   </div>
</header>
<!-- End of Header -->
