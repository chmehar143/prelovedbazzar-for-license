<div class="page-content mb-8">
    <div class="container">
        <div class="row gutter-lg">
            <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                <!-- Start of Sidebar Overlay -->
                <div class="sidebar-overlay"></div>
                <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                <div class="sidebar-content">
                    <div class="sticky-sidebar">
                        <div class="widget widget-collapsible widget-categories">
                            <h3 class="widget-title"><span>All Categories</span></h3>
                            <ul class="widget-body filter-items search-ul">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('sortby', $category->id) }}">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End of Widget -->
                        <!-- <div class="widget widget-collapsible widget-contact">
                            <h3 class="widget-title"><span>Contact Vendor</span></h3>
                            <div class="widget-body">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Your Name" />
                                <input type="text" class="form-control" name="email" id="email_1"
                                    placeholder="you@example.com" />
                                <textarea name="message" maxlength="1000" cols="25" rows="6"
                                    placeholder="Type your messsage..." class="form-control"
                                    required="required"></textarea>
                                <a href="#" class="btn btn-dark btn-rounded">Send Message</a>
                            </div>
                        </div> -->
                        <!-- End of Widget -->
                        <!-- <div class="widget widget-collapsible widget-time">
                            <h3 class="widget-title"><span>Store Time</span></h3>
                            <ul class="widget-body">
                                <li><label>Sunday</label></li>
                                <li><label>Monday</label></li>
                                <li><label>Tuesday</label></li>
                                <li><label>Wednesday</label></li>
                                <li><label>Thursday</label></li>
                                <li><label>Friday</label></li>
                                <li><label>Saturday</label></li>
                            </ul>
                        </div> -->
                        <!-- End of Widget -->
                        @if($bestsellings != NULL)
                        <div class="widget widget-collapsible widget-products">
                            <h3 class="widget-title"><span>Best Selling</span></h3>
                            <div class="widget-body">
                                @forelse($bestsellings as $selling)
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="{{ route('product', $selling->id) }}">
                                            <img src="{{asset('storage/uploads/products/'.$selling->p_image)}}" alt="Product" width="100"
                                                height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="{{ route('product', $selling->id) }}">{{$selling->p_name}}</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <?php $avg = 20 * $selling->discussions->avg('review')  ?>
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: {{ $avg }}%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">pkr{{$selling->p_new_price}}</div>
                                    </div>
                                </div>
                                @empty
                                <div class="product product-widget">
                                    <h4>No best selling yet</h4>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        @endif
                        <!-- End of Widget -->
                        <!-- <div class="widget widget-collapsible widget-products">
                            <h3 class="widget-title"><span>Top Rated</span></h3>
                            <div class="widget-body">
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('frontend-assets/assets/images/shop/12.jpg')}}" alt="Product" width="100"
                                                height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Classic Simple Backpack</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$85.00</div>
                                    </div>
                                </div>
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('frontend-assets/assets/images/shop/13.jpg')}}" alt="Product" width="100"
                                                height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Smart Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$90.00</div>
                                    </div>
                                </div>
                                <div class="product product-widget">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="assets/images/shop/20.jpg" alt="Product" width="100"
                                                height="106" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Pencil Case</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="product-price">$54.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End of Widget -->
                    </div>
                </div>
            </aside>
            <!-- End of Sidebar -->

            <div class="main-content">
                <div class="store store-banner mb-4">
                    <figure class="store-media">
                        <img src="{{asset('frontend-assets/assets/images/vendor/dokan/1.jpg')}}" alt="Vendor" width="930" height="446"
                            style="background-color: #414960;" />
                    </figure>
                    <div class="store-content">
                        <figure class="seller-brand">
                            <img src="{{asset('frontend-assets/assets/images/vendor/brand/1.jpg')}}" alt="Brand" width="80"
                                height="80" />
                        </figure>
                        <h4 class="store-title">{{ $vendor->name }}</h4>
                        <ul class="seller-info-list list-style-none mb-6">
                            <li class="store-address">
                                <i class="w-icon-map-marker"></i>
                                {{$vendor->address}}
                            </li>
                            <!-- <li class="store-phone">
                                <a href="tel:1234567890">
                                    <i class="w-icon-phone"></i>
                                    {{$vendor->phone}}
                                </a>
                            </li> -->
                            <li class="store-rating">
                                <i class="w-icon-star-full"></i>
                                4.33 rating from 3 reviews
                            </li>
                            <li class="store-open">
                                <i class="w-icon-cart"></i>
                                Store Open
                            </li>
                        </ul>
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-google w-icon-google"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                        </div>
                    </div>
                </div>
                <!-- End of Store Banner -->

                <h2 class="title vendor-product-title mb-4">Products</h2>

                <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                    @foreach($products as $product)
                    <div class="product-wrap">
                     <div class="product text-center">
                        <figure class="product-media">
                           <a href="{{route('product',$product->id)}}">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product"  style="width:300px;height:300px" />
                           </a>
                           <div class="product-action-vertical">
                              <button type="button" title="Add to cart" class="btn-product-icon btn-cart w-icon-cart" wire:click="addtocart({{ $product->id }})">
                              <button type="button" class="btn-product-icon btn-wishlist w-icon-heart" wire:click="addToWish({{ $product->id }})"></button>
                              <!-- <a href="javascript:void(0)" class="btn-product-icon btn-compare w-icon-compare"
                                 title="Compare"></a>
                                 <a href="javascript:void(0)" class="btn-product-icon btn-quickview w-icon-search"
                                 title="Quick View"></a> -->
                           </div>
                        </figure>
                        <?php 
                           $sum = $product->discussions->sum('review');
                           $no = $product->discussions->count('review');
                           if($sum == 0 || $no == 0){
                               $avg = 0;
                           }
                           else{
                               $aver = $sum/$no;
                               $avg = 20 * $aver;
                           }
                           ?>
                        <div class="product-details">
                           <div class="product-cat">
                              <a href="javascript:void(0)">{{$product->name}}</a>
                           </div>
                           <h3 class="product-name">
                              <a href="{{route('product',$product->id)}}">{{$product->p_name}}</a>
                           </h3>
                           <div class="ratings-container">
                              <div class="ratings-full">
                                 <span class="ratings" style="width: {{ $avg }}%;"></span>
                                 <span class="tooltiptext tooltip-top"></span>
                              </div>
                              <a href="{{route('product', $product->id)}}" class="rating-reviews">({{ $no }} reviews)</a>
                           </div>
                           <div class="product-pa-wrapper">
                              <div class="product-price">
                                 pkr{{$product->p_new_price}}
                              </div>
                           </div>
                        </div>
                     </div>
                    </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
            <!-- End of Main Content -->
        </div>
    </div>
</div>
