@extends('user.layouts.app')
@section('content')
<head>
   <style>
      .w-icon-minus:before {
      content: "";
      margin-left: 5px;
      }
      .w-icon-plus:before {
      content: "";
      margin-left: 5px;
      margin-bottom: 1;
      }
   </style>
</head>
<main class="main mb-10 pb-1">
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav container">
      <ul class="breadcrumb bb-no">
         <li><a href="demo1.html">Home</a></li>
         <li><a href="product-default.html">Products</a></li>
         <li>Vertical Thumbs</li>
      </ul>
      <ul class="product-nav list-style-none">
         <li class="product-nav-prev">
            <a href="#">
            <i class="w-icon-angle-left"></i>
            </a>
            <span class="product-nav-popup">
            <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product" width="110"
               height="110" />
            <span class="product-name">Soft Sound Maker</span>
            </span>
         </li>
         <li class="product-nav-next">
            <a href="#">
            <i class="w-icon-angle-right"></i>
            </a>
            <span class="product-nav-popup">
            <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product" width="110"
               height="110" />
            <span class="product-name">Fabulous Sound Speaker</span>
            </span>
         </li>
      </ul>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of Page Content -->
   <div class="page-content">
      <div class="container">
         <div class="product product-single row">
            <div class="col-md-6 mb-6">
               <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                  <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                     'navigation': {
                     'nextEl': '.swiper-button-next',
                     'prevEl': '.swiper-button-prev'
                     }
                     }">
                     <div class="swiper-wrapper row cols-1 gutter-no">
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 data-zoom-image="{{asset('frontend-assets/frontend-assets/assets/images/products/without/1-800x900.jpg')}}"
                                 alt="Bright Green IPhone" width="800" height="900">
                           </figure>
                        </div>
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 data-zoom-image="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 alt="Bright Green IPhone" width="488" height="549">
                           </figure>
                        </div>
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 data-zoom-image="{{asset('frontend-assets/assets/images/products/without/3-800x900.jpg')}}"
                                 alt="Bright Green IPhone" width="800" height="900">
                           </figure>
                        </div>
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 data-zoom-image="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 alt="Bright Green IPhone" width="800" height="900">
                           </figure>
                        </div>
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 data-zoom-image="{{asset('storage/uploads/products/'.$product->p_image)}}"
                                 alt="Bright Green IPhone" width="800" height="900">
                           </figure>
                        </div>
                     </div>
                     <button class="swiper-button-next"></button>
                     <button class="swiper-button-prev"></button>
                     <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                  </div>
                  <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                     'navigation': {
                     'nextEl': '.swiper-button-next',
                     'prevEl': '.swiper-button-prev'
                     },
                     'breakpoints': {
                     '992': {
                     'direction': 'vertical',
                     'slidesPerView': 'auto'
                     }
                     }
                     }">
                     <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product Thumb"
                              width="800" height="900">
                        </div>
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product Thumb"
                              width="800" height="900">
                        </div>
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product Thumb"
                              width="800" height="900">
                        </div>
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product Thumb"
                              width="800" height="900">
                        </div>
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product Thumb"
                              width="800" height="900">
                        </div>
                     </div>
                     <button class="swiper-button-prev"></button>
                     <button class="swiper-button-next"></button>
                  </div>
               </div>
            </div>
            <div class="col-md-6 mb-4 mb-md-6">
               <div class="product-details ">
                  <h1 class="product-title">{{$product->p_name}}</h1>
                  <div class="product-bm-wrapper">
                     <figure class="brand">
                        <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Brand" width="105"
                           height="48" />
                     </figure>
                     <div class="product-meta">
                        <div class="product-categories">
                           Category:
                           <span class="product-category"><a href="{{ route('sortby', $category->id) }}">{{$category->name}}</a></span>
                        </div>
                        <div class="product-sku">
                           SKU: <span>{{$product->p_sku}}</span>
                        </div>
                     </div>
                  </div>
                  <hr class="product-divider">
                  <div class="product-price"><ins class="new-price">pkr{{$product->p_new_price}}</ins></div>
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
                  <div class="ratings-container">
                     <div class="ratings-full">
                        <span class="ratings" style="width: {{$avg}}%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                     </div>
                     <a href="#" class="rating-reviews">({{$no}} Reviews)</a>
                  </div>
                  <div class="product-short-desc lh-2">
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
                  <div class="fix-bottom product-sticky-content sticky-content">
                     <!-- size starts here -->
                     <div
                        class="product-form product-variation-form product-size-swatch mb-3">
                        <label class="mb-1">Size:</label>
                        <ul
                              class="flex-wrap d-flex align-items-center product-variations">
                              @if($product->large == 1)
                              <li>
                                 <input type="radio" id="large" name="size" value="large" style="display: none;">
                                 <label for="large" class="size">Large</label>
                              </li>                                                                
                              @endif
                              @if($product->medium == 1)
                              <li>
                                 <input type="radio" id="medium" name="size" value="medium" style="display: none;">
                                 <label for="medium" class="size">Medium</label>
                              </li>
                              @endif
                              @if($product->small == 1)
                              <li>
                                 <input type="radio" id="small" name="size" value="small" style="display: none;">
                                 <label for="small" class="size">Small</label>
                              </li>                                                                
                              @endif
                        </ul>
                        <!-- <a href="javascript:void(0)" class="product-variation-clean">Clean All</a> -->
                     </div>
                     <!-- size end here -->
                     <div class="product-form container" >
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <div class="product-qty-form with-label">
                           <label>Quantity:</label>
                           <div class="input-group">
                              <input class="quantity form-control" type="number" min="1"
                                 id="qnty" value="1" max="10000000">
                              <a class="quantity-plus w-icon-plus" style="margin-left: -4pc;margin-top:10px; width: 2.4rem;height: 2.4rem;
                                 border-radius: 50%;
                                 cursor:pointer;
                                 background-color: #eee;
                                 color: #666;
                                 font-size: 1.4rem;
                                 border: none;
                                 line-height: 21px;"></a>
                              <a class="quantity-minus w-icon-minus" style="position: absolute;
                                 top: 50%;
                                 -webkit-transform: translateY(-50%);
                                 transform: translateY(-50%);
                                 cursor:pointer;
                                 right: 1.5rem;
                                 padding: 0;
                                 width: 2.4rem;
                                 height: 2.4rem;
                                 border-radius: 50%;
                                 background-color: #eee;
                                 color: #666;
                                 font-size: 1.4rem;
                                 border: none;
                                 line-height: 21px;"></a>
                           </div>
                        </div>
                        <button class="btn btn-primary btn-cart" id="postbutton">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                        </button>
                     </div>
                  </div>
                  <div class="social-links-wrapper">
                     <div class="social-links">
                        <div class="social-icons social-no-color border-thin" style="visibility:hidden">
                           <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                           <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                           <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                           <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                           <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                     </div>
                     <span class="divider d-xs-show"></span>
                     <div class="product-link-wrapper d-flex">
                        <a href="javascript:void(0)" class="btn-product-icon btn-wishlist w-icon-heart" onclick="add_wish_({{$product->id}})" ><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a href="#product-tab-description" class="nav-link active">Description</a>
               </li>
               <li class="nav-item">
                  <a href="#product-tab-reviews" class="nav-link">Customer Reviews ({{ $no }})</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="product-tab-description">
                  <div class="row mb-4">
                     <div class="col-md-6 mb-5">
                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                        <?php $detail = strip_tags($product->p_detail); ?>
                        <p class="mb-4">{{$detail}}
                        </p>
                        <ul class="list-type-check">
                           <?php $policy = strip_tags($product->p_r_policy); ?>
                           <li>{{$policy}}</li>
                        </ul>
                     </div>
                     <div class="col-md-6 mb-5">
                        <div class="banner banner-video product-video br-xs">
                           <figure class="banner-media">
                              <a href="#">
                              <img src="{{asset('frontend-assets/assets/images/products/video-banner-610x300.jpg')}}"
                                 alt="banner" width="610" height="300"
                                 style="background-color: #bebebe;">
                              </a>
                              <a class="btn-play-video btn-iframe"
                                 href="assets/video/memory-of-a-woman.mp4"></a>
                           </figure>
                        </div>
                     </div>
                  </div>
                  <div class="row cols-md-3">
                     <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free Shipping
                           &amp; Return
                        </h5>
                        <p class="detail pl-5">We offer free shipping for products on orders above 50$
                           and offer free delivery for all orders in US.
                        </p>
                     </div>
                     <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy Returns</h5>
                        <p class="detail pl-5">We guarantee our products and you could get back all of
                           your money anytime you want in 30 days.
                        </p>
                     </div>
                     <div class="mb-3">
                        <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing</h5>
                        <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or over 250$
                           for a year with our special credit card.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="product-tab-reviews">
                  <div class="row mb-4">
                     <div class="col-xl-4 col-lg-5 mb-4">
                        <div class="ratings-wrapper">
                           <div class="avg-rating-container">
                              <h4 class="avg-mark font-weight-bolder ls-50">{{ round($avg/20 , 1) }}</h4>
                              <div class="avg-rating">
                                 <p class="text-dark mb-1">Average Rating</p>
                                 <div class="ratings-container">
                                    <div class="ratings-full">
                                       <span class="ratings" style="width: {{ $avg }}%;"></span>
                                       <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">({{$no}} Reviews)</a>
                                 </div>
                              </div>
                           </div>
                           <div class="ratings-value d-flex align-items-center text-dark ls-25">
                              <span class="text-dark font-weight-bold">{{ round($avg, 1) }}%</span>Recommended<span
                                 class="count">({{ intval($avg*$no/100) }} of {{$no}})</span>
                           </div>
                           <div class="ratings-list">
                              <div class="ratings-container">
                                 <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                 </div>
                                 <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                 </div>
                                    <?php 
                                       if($no > 0){
                                          $fipers = $five*100 / $no;
                                                                          
                                          $fopers = $four*100 / $no;
                                      
                                          $thpers = $three*100 / $no;
                                  
                                          $twpers = $two*100 / $no;
                                    
                                          $onpers = $one*100 / $no;
                                       }
                                       else{
                                          $fipers = 0;
                                          $fopers = 0;
                                          $thpers = 0;
                                          $twpers = 0;
                                          $onpers = 0;
                                       }
                                    ?>                                          
                                 <div class="progress-value">
                                    <mark>{{ intval($fipers)}}%</mark>
                                 </div>
                              </div>
                              <div class="ratings-container">
                                 <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                 </div>
                                 <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                 </div>
                                 <div class="progress-value">
                                    <mark>{{ intval($fopers)}}%</mark>
                                 </div>
                              </div>
                              <div class="ratings-container">
                                 <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                 </div>
                                 <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                 </div>
                                 <div class="progress-value">
                                    <mark>{{ intval($thpers)}}%</mark>
                                 </div>
                              </div>
                              <div class="ratings-container">
                                 <div class="ratings-full">
                                    <span class="ratings" style="width: 40%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                 </div>
                                 <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                 </div>
                                 <div class="progress-value">
                                    <mark>{{ intval($twpers)}}%</mark>
                                 </div>
                              </div>
                              <div class="ratings-container">
                                 <div class="ratings-full">
                                    <span class="ratings" style="width: 20%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                 </div>
                                 <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                 </div>
                                 <div class="progress-value">
                                    <mark>{{ intval($onpers)}}%</mark>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-8 col-lg-7 mb-4">
                        <div class="review-form-wrapper">
                           <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review
                           </h3>
                           <p class="mb-3">Your email address will not be published. Required fields
                              are marked *
                           </p>
                           <form action="javascript:void(0)" method="POST" class="review-form">
                              <div class="rating-form">
                                 <label for="rating">Your Rating Of This Product :</label>
                                 <span class="rating-stars">
                                 <a class="star--1" href="#">1</a>
                                 <a class="star-2" href="#">2</a>
                                 <a class="star-3" href="#">3</a>
                                 <a class="star-4" href="#">4</a>
                                 <a class="star-5" href="#">5</a>
                                 </span>
                                 <select name="rating" id="rating" required=""
                                    style="display: block;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                 </select>
                                 <input type="hidden" id="id" value="{{$product->id}}">
                              </div>
                              <textarea cols="30" rows="6" placeholder="Write Your Review Here..."
                                 class="form-control" id="review" name="review" ></textarea>
                              <div class="row gutter-md">
                                 <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name"
                                       id="author" name="author">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Email"
                                       id="email_1" name="email_1">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                 <label for="save-checkbox">Save my name, email, and website in this
                                 browser for the next time I comment.</label>
                              </div>
                              <button type="reset" class="btn btn-dark" id="add_review" >Submit Review</button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a href="#show-all" class="nav-link active">Show All</a>
                        </li>
                        <li class="nav-item">
                           <a href="#helpful-positive" class="nav-link">Most Helpful Positive</a>
                        </li>
                        <li class="nav-item">
                           <a href="#helpful-negative" class="nav-link">Most Helpful Negative</a>
                        </li>
                        <li class="nav-item">
                           <a href="#highest-rating" class="nav-link">Highest Rating</a>
                        </li>
                        <li class="nav-item">
                           <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane active" id="show-all">
                           <ul class="comments list-style-none">
                              @foreach($allreview as $revs)
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{ asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">{{$revs->user_name}}</a>
                                          <span class="comment-date">{{$revs->updated_at->format('d-F-Y, H:i')}}</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: {{$revs->review*20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>{{$revs->comment }}
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (1)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                          </a>
                                          <div class="review-image">
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-1.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-1-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                        <div class="tab-pane" id="helpful-positive">
                           <ul class="comments list-style-none">
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">John Doe</a>
                                          <span class="comment-date">March 22, 2021 at 1:54
                                          pm</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: 60%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>pellentesque habitant morbi tristique senectus et. In
                                          dictum non consectetur a erat.
                                          Nunc ultrices eros in cursus turpis massa tincidunt ante
                                          in nibh mauris cursus mattis.
                                          Cras ornare arcu dui vivamus arcu felis bibendum ut
                                          tristique.
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (1)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                          </a>
                                          <div class="review-image">
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-1.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-1.jpg')}}" />
                                                </figure>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="assets/images/agents/2-100x100.png"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">John Doe</a>
                                          <span class="comment-date">March 22, 2021 at 1:52
                                          pm</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: 80%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                          sapien.
                                          Ultrices eros in cursus turpis massa tincidunt ante in
                                          nibh mauris cursus mattis.
                                          Cras ornare arcu dui vivamus arcu felis bibendum ut
                                          tristique.
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (1)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                          </a>
                                          <div class="review-image">
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-2.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-2-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-3.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane" id="helpful-negative">
                           <ul class="comments list-style-none">
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{asset('frontend-assets/assets/images/agents/3-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">John Doe</a>
                                          <span class="comment-date">March 22, 2021 at 1:21
                                          pm</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: 60%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>In fermentum et sollicitudin ac orci phasellus. A
                                          condimentum vitae
                                          sapien pellentesque habitant morbi tristique senectus
                                          et. In dictum
                                          non consectetur a erat. Nunc scelerisque viverra mauris
                                          in aliquam sem fringilla.
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (0)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (1)
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane" id="highest-rating">
                           <ul class="comments list-style-none">
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="assets/images/agents/2-100x100.png"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">John Doe</a>
                                          <span class="comment-date">March 22, 2021 at 1:52
                                          pm</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: 80%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                          sapien.
                                          Ultrices eros in cursus turpis massa tincidunt ante in
                                          nibh mauris cursus mattis.
                                          Cras ornare arcu dui vivamus arcu felis bibendum ut
                                          tristique.
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (1)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                          </a>
                                          <div class="review-image">
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-2.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-2-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-3.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="tab-pane" id="lowest-rating">
                           <ul class="comments list-style-none">
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="assets/images/agents/1-100x100.png"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">John Doe</a>
                                          <span class="comment-date">March 22, 2021 at 1:54
                                          pm</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: 60%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>pellentesque habitant morbi tristique senectus et. In
                                          dictum non consectetur a erat.
                                          Nunc ultrices eros in cursus turpis massa tincidunt ante
                                          in nibh mauris cursus mattis.
                                          Cras ornare arcu dui vivamus arcu felis bibendum ut
                                          tristique.
                                       </p>
                                       <div class="comment-action">
                                          <a href="#"
                                             class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-up"></i>Helpful (1)
                                          </a>
                                          <a href="#"
                                             class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                          <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                          </a>
                                          <div class="review-image">
                                             <a href="#">
                                                <figure>
                                                   <img src="{{asset('frontend-assets/assets/images/products/default/review-img-3.jpg')}}"
                                                      width="60" height="60"
                                                      alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                      data-zoom-image="{{asset('frontend-assets/assets/images/products/default/review-img-3-800x900.jpg')}}" />
                                                </figure>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <section class="vendor-product-section">
            <div class="title-link-wrapper mb-4">
               <h4 class="title text-left">More Products From This Vendor</h4>
               <a href="javascript:void(0)" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
               Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="swiper-container swiper-theme" data-swiper-options="{
               'spaceBetween': 20,
               'slidesPerView': 2,
               'breakpoints': {
               '576': {
               'slidesPerView': 3
               },
               '768': {
               'slidesPerView': 4
               },
               '992': {
               'slidesPerView': 4
               }
               }
               }">
               <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                  @foreach($moreproducts as $unit)
                  <div class="swiper-slide product">
                     <figure class="product-media">
                        <a href="{{route('product',$unit->id)}}">
                        <img src="{{asset('storage/uploads/products/'.$unit->p_image)}}" alt="Product"
                           width="300" height="338" />
                        <img src="{{asset('storage/uploads/products/'.$unit->p_image)}}" alt="Product"
                           width="300" height="338" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart" onclick="add_cart_({{$unit->id}})"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist" onclick="add_wish_({{$unit->id}})"></a>

                        </div>
                        
                     </figure>
                     <div class="product-details text-center">
                        <div class="product-cat"><a href="{{route('product', $unit->id)}}">{{$unit->name}}</a>
                        </div>
                        <h4 class="product-name"><a href="{{route('product', $unit->id)}}">{{$unit->p_name}}</a>
                        </h4>
                        <?php 
                           $sum = $unit->discussions->sum('review');
                           $no = $unit->discussions->count('review');
                           if($sum == 0 || $no == 0){
                              $avg = 0;
                           }
                           else{
                              $aver = $sum/$no;
                              $avg = 20 * $aver;
                           }
                        ?>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: {{ $avg }}%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="{{ route('product',$unit->id ) }}" class="rating-reviews" >({{ $no }} reviews)</a>
                        </div>
                        <div class="product-pa-wrapper">
                           <div class="product-price">pkr{{$unit->p_new_price}}</div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </section>
         <section class="related-product-section">
            <div class="title-link-wrapper mb-4">
               <h4 class="title">Related Products</h4>
               <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
               Products<i class="w-icon-long-arrow-right"></i></a>
            </div>
            <div class="swiper-container swiper-theme" data-swiper-options="{
               'spaceBetween': 20,
               'slidesPerView': 2,
               'breakpoints': {
               '576': {
               'slidesPerView': 3
               },
               '768': {
               'slidesPerView': 4
               },
               '992': {
               'slidesPerView': 4
               }
               }
               }">
               <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                  @foreach($related_products as $related)
                  <div class="swiper-slide product">
                     <figure class="product-media">
                        <a href="{{ route('product', $related->id) }}">
                        <img src="{{asset('storage/uploads/products/'.$related->p_image)}}" alt="Product"
                           width="300" height="338" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="javascript:void(0)" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart" onclick="add_cart_({{ $related->id }})"></a>
                           <a href="javascript:void(0)" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist" onclick="add_wish_({{ $related->id }})"></a>
                        </div>
                     </figure>
                     <?php 
                        $sum = $related->discussions->sum('review');
                        $no = $related->discussions->count('review');
                        if($sum == 0 || $no == 0){
                           $avg = 0;
                        }
                        else{
                           $aver = $sum/$no;
                           $avg = 20 * $aver;
                        }
                     ?>
                     <div class="product-details text-center">
                        <h4 class="product-name"><a href="product-default.html">{{$related->p_name}}</a></h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: {{$avg}}%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">({{ $no }} reviews)</a>
                        </div>
                        <div class="product-pa-wrapper">
                           <div class="product-price">pkr{{$related->p_new_price}}</div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </section>
      </div>
   </div>
   
   <!-- End of Page Content -->
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
   $("#postbutton").click(function(){
         var id = $("#product_id").val();
         var quantity = $("#qnty").val();
            if(!quantity){
                var quantity = 1;
            }
            var size = $("input[name='size']:checked").val();
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
        });
   
        $("#add_review").click(function(){
            var id = $("#id").val();
            var rating = $("#rating").val();
            var review = $("#review").val();
            var author = $("#author").val();
            var email_1 = $("#email_1").val();
            // processing ajax request
            $.ajax({
                url: "{{ route('add_review') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    rating: rating,
                    review: review,
                    author: author,
                    email_1: email_1
                },
                success: function(data) {
                    // log response into console
                    console.log(data);
                    alert('A reviw has been added!');
                }
            });
        });
   
</script>
@endsection