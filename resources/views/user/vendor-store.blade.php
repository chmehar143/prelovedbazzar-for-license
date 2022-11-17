@extends('user.layouts.app')

@section('content')


   <!-- Start of Main -->
   <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb mb-6">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('vendor-store') }}">Vendor Stores</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Pgae Contetn -->
            <div class="page-content mb-8">
                <div class="container">
                    <!-- Start of Vendor Toolbox -->
                    <div class="toolbox vendor-toolbox pb-0">
                        <div class="toolbox-left mb-4 mb-md-0">
                            <!-- <a href="#" class="btn btn-primary btn-outline btn-rounded btn-icon-left vendor-search-toggle "><i class="w-icon-category"></i>Filter</a> -->
                            <label class="d-block">Total Store Showing 6</label>
                        </div>
                        <div class="toolbox-right">
                            <!-- <div class="toolbox-item toolbox-sort select-box mb-0">
                                <label class="font-weight-normal">Sort by:</label>
                                <select name="orderby" class="form-control">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="recent">Most Recent</option>
                                    <option value="popular">Most Popular</option>
                                </select>
                            </div> -->
                            <!-- <div class="toolbox-item toolbox-layout mb-0 d-flex">
                                <a href="vendor-dokan-store-grid.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="vendor-dokan-store-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- End of Vendor Toolbox -->
                    <div class="vendor-search-wrapper">
                        <form class="vendor-search-form">
                            <input type="email" class="form-control mr-4 bg-white" name="vendor" id="vendor"
                                placeholder="Search Vendors" />
                            <button class="btn btn-primary btn-rounded" type="submit">Apply</button>
                        </form>
                        <!-- End of Vendor Search Form -->
                    </div>
                    <div class="row cols-lg-3 cols-md-2 cols-sm-2 cols-1 mt-4">
                        @foreach($vendors as $vendor)
                        <div class="store-wrap mb-4">
                            <div class="store store-grid">
                                <div class="store-header">
                                    <figure class="store-banner">
                                    <img src="@if($vendor->shop_image == '') {{asset('frontend-assets/assets/images/vendor/dokan/1.jpg')}} 
                                        @else  {{asset('storage/uploads/vendors/'.$vendor->shop_image)}} @endif" alt="{{$vendor->name}}" />
                                    </figure>
                                </div>
                                <!-- End of Store Header -->
                                <div class="store-content">
                                    <h4 class="store-title">
                                        <a href="{{route('vendor-store-details',$vendor->id)}}">{{$vendor->name}}</a>
                                        <label class="featured-label">Featured</label>
                                    </h4>
                                    <!-- <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div> -->
                                    <div class="store-address">
                                        {{$vendor->address}}
                                    </div>
                                    <ul class="seller-info-list list-style-none">
                                        <!-- <li class="store-phone">
                                            <a href="tel:1234567890"><i class="w-icon-phone"></i>{{$vendor->phone}}</a>
                                        </li> -->
                                    </ul>
                                </div>
                                <!-- End of Store Content -->
                                <div class="store-footer">
                                    <figure class="seller-brand">
                                    <img src="@if($vendor->shop_image == '') {{asset('frontend-assets/assets/images/vendor/brand/1.jpg')}}
                                        @else {{asset('storage/uploads/vendors/'.$vendor->shop_image)}} @endif" alt="Brand" width="80" height="80" />
                                    </figure>
                                    <a href="{{route('vendor-store-details',$vendor->id)}}" class="btn btn-dark btn-link btn-underline btn-icon-right btn-visit">
                                        Visit Store<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <!-- End of Store Footer -->
                            </div>
                            <!-- End of Store -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container">
                    </div>
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

            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

@endsection
