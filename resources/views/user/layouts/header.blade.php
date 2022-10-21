
<header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Preloved Bazar Store!</p>
                        <p class="welcome-msg"></p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown ">
                            <a href="#currency">USD</a>
                            <div class="dropdown-box">
                                <a href="#USD">USD</a>
                                <a href="#EUR">EUR</a>
                            </div>
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown">
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
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <!-- <a href="{{route('blogs')}}" class="d-lg-show">Blog</a> -->
                        <a href="{{route('contact-us')}}" class="d-lg-show">Contact Us</a>
                        <a href="{{route('about-us')}}" class="d-lg-show">About Us</a>
                        @if(Auth::guard('user')->check())
                        <a href="{{route('my-account')}}" class="d-lg-show"><i class="w-icon-account"></i> Hi {{Auth::guard('user')->user()->name}}!</a>
                        <a href="{{route('my-account')}}" class="d-lg-show">My Account</a>
                        @else
                        <a href="{{route('user.login')}}" class="d-lg-show"><i class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter  d-lg-show">/</span>
                        <a href="{{route('user.login')}}" class="ml-0 d-lg-show ">Register</a>
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
                        <a href="demo1.html" class="logo ml-lg-0">
                            <!-- <img src="{{asset('frontend-assets/assets/images/logo.png')}}" alt="logo" width="144" height="45" /> -->
                        </a>
                        <form method="get" action="#"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    @foreach($shareData['categories'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
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
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="{{route('wishlist')}}">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <div class="dropdown cart-dropdown mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="{{route('cart')}}" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">{{$carts->count()}}</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <!-- <div class="dropdown-box" style="overflow-y: scroll;">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="products">
                                    <?php $total = 0; ?>
                                    @forelse($carts as $cart)
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="{{route('product', $cart->prod_id)}}" class="product-name">{{$cart['p_name']}}</a>
                                            <div class="price-box">
                                                <span class="product-quantity">{{$cart['quantity']}}</span>
                                                <span class="product-price">${{$cart['p_new_price']}}</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="{{route('product', $cart->prod_id)}}">
                                                <img src="{{asset('storage/uploads/products/'. $cart['p_image'])}}" alt="product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                    </div>
                                    <?php $total = $total + $cart['quantity']* $cart['p_new_price']; ?>
                                    @empty
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <h4>No Item</h4>
                                        </div>
                                    </div>
                                    @endforelse
                                    <div class="cart-total">
                                        <label>Subtotal:</label>
                                        <span class="price">${{$total}}</span>
                                    </div>

                                    <div class="cart-action">
                                        <a href="{{route('cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                        <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                                    </div>
                                </div>


                            </div> -->
                            <!-- End of Dropdown Box -->
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
                                            <a href="{{route('shop')}}">
                                                <i class="w-icon-tshirt2"></i>{{$category->name}}
                                            </a>
                                            <ul class="">
                                                @foreach($category['subcategory'] as $subcategory)  
                                                    <li><a href="{{route('shop')}}">{{$subcategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="{{route('index')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('shop') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{route('vendor-store')}}">Vendor Stores</a>

                                    </li>
                                    <li>
                                        <a href="{{route('blogs')}}">Blog</a>

                                    </li>
                                    <li><a href="{{route('vendor.register')}}">Become A Vendor</a></li>

                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->