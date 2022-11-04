@extends('user.layouts.app')
@section('content')
<!-- Start of Main -->
<main class="main">
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb bb-no">
            <li><a href="demo1.html">Home</a></li>
            <li><a href="shop-banner-sidebar.html">Shop</a></li>
            <li>Boxed</li>
         </ul>
      </div>
   </nav>
   <!-- End of Breadcrumb-nav -->
   <!-- livewire -->
      @livewire('userend.products.sort-by-price', ['min' => Route::current()->parameter('min'), 'max' => Route::current()->parameter('max') ])
      <!-- endlivewire -->
   <div class="swiper-container swiper-theme show-code-action" data-swiper-options="{
      'autoplay': true,
      'slidesPerView': 2,
      'breakpoints': {
      '576': {
      'slidesPerView': 3
      },
      '768': {
      'slidesPerView': 4
      },
      '992': {
      'slidesPerView': 5
      },
      '1200': {
      'slidesPerView': 6
      }
      }
      }">
      <div class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 gutter-no">
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-1.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-2.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-6.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-3.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-4.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
         <figure class="swiper-slide instagram">
            <a href="#">
            <img src="frontend-assets/assets/images/instagram/instagram-5.jpg" alt="Instagram" width="320"
               height="320" />
            </a>
         </figure>
      </div>
      <div class="swiper-pagination"></div>
   </div>
</main>
<!-- End of Main -->
@endsection