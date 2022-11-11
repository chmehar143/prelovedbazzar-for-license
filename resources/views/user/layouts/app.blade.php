
<!DOCTYPE html>
<html lang="en">
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;

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

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title> Home -   Multivendor </title>

    <meta name="keywords" content=" Preloved Bazar" />
    <meta name="description" content=" Preloved Bazar is powerful marketplace &amp;  website.">
    <meta name="author" content="BS3-design">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/png"  href="{{asset('frontend-assets/assets/images/icons/favicon.png')}}" > -->

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('frontend-assets/assets/fonts/wolmart.woff?png09e" as="font" type="font/woff')}}" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/vendor/magnific-popup/magnific-popup.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Default CSS -->
    @if(Request::segment(1) != '')
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/css/style.css')}}">
    @else
    <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/assets/css/homepage.css')}}">
    @endif

    <!-- alertify -->
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- end alertify -->
    @livewireStyles
</head>
<body class="home">
<div class="page-wrapper">
    <h1 class="d-none">Preloved Bazar </h1>
    @include('user.layouts.header')
    @yield('content')
    @include('user.layouts.footer')
    </div>
<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{ route('index') }}" class="sticky-link " @if(Request::segment(1) == '') style="color: red;" @endif >
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('shop') }}" class="sticky-link" @if(Request::segment(1) == 'shop') style="color: red;" @endif >
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>
    <a href="{{ route('my-account') }}" class="sticky-link" @if(Request::segment(1) == 'user') style="color: red;" @endif >
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="{{ route('cart') }}" class="sticky-link" @if(Request::segment(1) == 'cart') style="color: red;" @endif >
            <i class="w-icon-cart"></i>
            <p>Cart</p>
        </a>
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="javascript:void(0)" class="search-toggle sticky-link" @if(Request::segment(1) == 'search') style="color: red;" @endif >
            <i class="w-icon-search"></i>
            <p>Search</p>
        </a>
        <form  action="{{ route('search_product') }}" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" value="{{ Request::get('search') }}"  placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
        version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>
                        <a href="{{ route('shop') }}">Shop</a>
                        <!-- <ul>
                            <li>
                                <a href="#">MENS CLOTH </a>
                                <ul>
                                    <li><a href="{{ route('shop') }}"> product name </a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">WOMEN CLOTH</a>
                                <ul>
                                    <li><a href="shop-grid-3cols.html">  product name</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">BABY CLOTH </a>
                                <ul>
                                    <li><a href="product-variable.html">product name</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="#">CLOTHES PRODUCT    </a>
                                <ul>
                                    <li><a href="product-details.html">product name<span
                                                class="tip tip-hot">Hot</span></a></li>

                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{ route('vendor-store') }}">Vendor Stores</a>

                    </li>
                   
                    <li><a href="{{ route('become-a-vendor') }}">Become A Vendor</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach($shareData['categories']->slice(0, 8) as $category)
                    <li>
                        <a href="{{ route('sortby', $category->id) }}">
                            {{$category->name}}
                        </a>
                        <ul>
                            @foreach($category->subcategory as $subcategory)
                            <li>
                                <a href="{{ route('subcat', $subcategory->id) }}">{{$subcategory->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
<!-- 

                    <li class="model-fade">
                        <a href="{{ route('shop') }}"
                           class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Start of Newsletter popup -->
<div class="newsletter-popup mfp-hide">
    <div class="newsletter-content">
        <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span></h4>
        <h2 class="ls-25">Sign up to Preloved Bazar</h2>
        <p class="text-light ls-10">Subscribe to the Preloved Bazar market newsletter to
            receive updates on special offers.</p>
        <form action="javascript:void(0)" class="input-wrapper input-wrapper-inline input-wrapper-round">
            <input type="email" class="form-control email font-size-md" name="email" id="email"
                   placeholder="Your email address" required>
            <button type="reset" class="btn btn-dark" id="suboffer" >SUBMIT</button>
        </form>
        <div id="infomessage"></div>
        <div class="form-checkbox d-flex align-items-center">
            <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                   required="">
            <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
        </div>
    </div>
</div>
<!-- End of Newsletter popup -->

<!-- Start of Quick View -->
<!-- <div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                    <div class="swiper-wrapper row cols-1 gutter-no">
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('frontend-assets/assets/images/products/popup/1-440x494.jpg')}}"
                                     data-zoom-image="{{asset('frontend-assets/assets/images/products/popup/1-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('frontend-assets/assets/images/products/popup/2-440x494.jpg')}}"
                                     data-zoom-image="{{asset('frontend-assets/assets/images/products/popup/2-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('frontend-assets/assets/images/products/popup/3-440x494.jpg')}}"
                                     data-zoom-image="{{asset('frontend-assets/assets/images/products/popup/3-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="{{asset('frontend-assets/assets/images/products/popup/4-440x494.jpg')}}"
                                     data-zoom-image="{{asset('frontend-assets/assets/images/products/popup/4-800x900.jpg')}}"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('frontend-assets/assets/images/products/popup/1-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('frontend-assets/assets/images/products/popup/2-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('frontend-assets/assets/images/products/popup/3-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="{{asset('frontend-assets/assets/images/products/popup/4-103x116.jpg')}}" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Electronics Black Wrist Watch</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="{{asset('frontend-assets/assets/images/products/brand/brand-1.jpg')}}" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Electronics</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End of Quick view -->




<!-- Plugin JS File -->
<script src="{{asset('frontend-assets/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/zoom/jquery.zoom.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend-assets/assets/vendor/skrollr/skrollr.min.js')}}"></script>

<!-- Swiper JS -->
<script src="{{asset('frontend-assets/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('frontend-assets/assets/js/main.min.js')}}"></script>

<!-- ajax for subscription -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $("#subscribe").click(function(){
            var email = $("#mail").val();
            // processing ajax request
            $.ajax({
                url: "{{ route('subscribe') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: email
                },
                error: function(response){

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">invalid email</a>'
                    });
                },

                success: function(data) {
                    Swal.fire(
                         'Sent!',
                         'Successfully subscribed to our newsletter!',
                         'success'
                    );
                }
            });
        });

        $("#suboffer").click(function(){
            var email = $("#email").val();
            // processing ajax request
            $.ajax({
                url: "{{ route('subscribe') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: email
                },
                error: function(response){

                    //check if response has errors object
                     $('#infomessage').append('<p text-white">This email is not valid</p>').delay(3000).fadeOut();
                },

                success: function(data) {
                    $('#infomessage').append('<p>You have been successfully subscribed! </p>').delay(3000).fadeOut();
                }
            });
        });


function add_cart_(id){
    var id = id;
    var size = $("input[name='size']:checked").val();
    var quantity = $("#qnty_" +id).val();
    if(!quantity){
            var quantity = 1;
        }
        if(!size){
            var size = 'medium';
        }
        // processing ajax request
        $.ajax({
        url: "{{ route('addcart') }}",
        type: 'POST',
        dataType: "json",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
            quantity: quantity,
            size: size
        },
        success: function(data) {
            // log response into console
            console.log(data);
        }
    });
}
    function add_wish_(id){
        // processing ajax request    
        $.ajax({
            url: "{{ url('addwish') }}" + '/' + id,
            success: function() {
                // log response into console
                console.log("product has been aded to wish list");
            }
        });   
    }
</script>
<!-- /ajax for subscription -->

<!-- alertify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
window.addEventListener('message', event => {
    alertify.set('notifier','position', 'top-right');
    alertify.notify(event.detail.text, event.detail.type);})
</script>
<!-- end alertify -->


<!-- live-wire -->
@livewireScripts

</body>


</html>
