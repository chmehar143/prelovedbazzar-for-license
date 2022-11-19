<div class="container">
         <div class="product product-single row">
            <div class="col-md-6 ">
               <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                  <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                     'navigation': {
                     'nextEl': '.swiper-button-next',
                     'prevEl': '.swiper-button-prev'
                     }
                     }">
                     <div class="swiper-wrapper row cols-1 gutter-no">
                        @foreach($product->gallery->slice(0, 5) as $image)
                        <div class="swiper-slide">
                           <figure class="product-image">
                              <img src="{{asset('storage/uploads/gallery/'.$image->image)}}"
                                 data-zoom-image="{{asset('frontend-assets/frontend-assets/assets/images/products/without/1-800x900.jpg')}}"
                                 alt="Bright Green IPhone"  style="width:504px;height:504px">
                           </figure>
                        </div>
                        @endforeach
                     </div>
                     <button class="swiper-button-next"></button>
                     <button class="swiper-button-prev"></button>
                     <!-- <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a> -->
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
                        @foreach($product->gallery->slice(0, 5) as $image)
                        <div class="product-thumb swiper-slide">
                           <img src="{{asset('storage/uploads/gallery/'.$image->image)}}" alt="Product Thumb"
                              style="width:auto;height:auto">
                        </div>
                        @endforeach
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
                        <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Brand" style="width:140;height:125px" />
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
                  <div class="fix-bottom product-sticky-content ">
                     <div class="product-form product-variation-form product-size-swatch mb-3">
                        <label class="mb-1">Size:</label>
                        <ul class="flex-wrap d-flex align-items-center product-variations">
                           @if($product->large == 1)
                              <button type = "button" wire:click="sizeProduc('large')" class="size" style="margin-right: 8px;">large</button>                                                                
                           @endif
                           @if($product->medium == 1)
                              <button type = "button" wire:click="sizeProduc('medium')" class="size" style="margin-right: 8px;" >medium</button>
                           @endif
                           @if($product->small == 1)
                              <button type = "button" wire:click="sizeProduc('small')" class="size" style="margin-right: 8px;">small</button>                                                               
                           @endif
                        </ul>
                     </div>
                     <div class="product-form container" >
                        <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <div class="product-qty-form with-label">
                           <label>Quantity:</label>
                           <div class="input-group">
                              <input class="quantity form-control" type="number" min="1"
                                 id="qnty" wire:model="quantitycount" value="{{ $this->quantitycount }}" max="10000000" readonly >
                              <button type="button" wire:click="incProduct" class="w-icon-plus"></button>
                              <button type="button" wire:click="decProduct" class="w-icon-minus" ></button>
                           </div>
                        </div>
                        <button class="btn btn-primary btn-cart" wire:click="addtocart({{ $product->id }})">
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
                     <!-- <div class="product-link-wrapper d-flex">
                        <button type="button" class="btn-product-icon btn-wishlist w-icon-heart" wire:click="addToWish({{ $product->id }})"><span></span></button>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                     </div> -->

                  </div>
               </div>
            </div>
         </div>
         <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a href="#product-tab-description" class="nav-link ">Description</a>
               </li>
               <li class="nav-item">
                  <a href="#product-tab-reviews" class="nav-link active">Customer Reviews ({{ $no }})</a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane " id="product-tab-description">
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
               <div class="tab-pane active" id="product-tab-reviews">
                  <div class="row mb-4">
                     <div class="col-xl-4 col-lg-5 mb-4">
                        <div class="ratings-wrapper">
                           <div class="avg-rating-container">
                              <h4 class="avg-mark font-weight-bolder ls-50">
                                 @livewire('userend.products.rating', [
                                 'id' => Route::current()->parameter('id') ])
                              </h4>
                              <div class="avg-rating">
                                 <p class="text-dark mb-1">Average Rating</p>
                                 <div class="ratings-container">
                                    <div class="ratings-full">
                                       <span class="ratings" style="width: {{ $avg }}%;"></span>
                                       <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="javascript:void(0)" class="rating-reviews">
                                       @livewire('userend.products.review-count', [
                                       'id' => Route::current()->parameter('id') ])
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="ratings-value d-flex align-items-center text-dark ls-25">
                              <span class="text-dark font-weight-bold">
                                 @livewire('userend.products.percent-count', [
                                 'id' => Route::current()->parameter('id') ])
                              </span>Recommended<span
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
                           <form class="review-form" wire:submit.prevent="addrating({{$product->id}})" >
                              <div class="rating-form">
                                 <label for="rating">Your Rating Of This Product :</label>
                                 <select wire:model="review"  required
                                    style="display: block;">
                                    <option disabled>Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                 </select>
                              </div>
                              <textarea cols="30" rows="6" placeholder="Write Your Review Here..."
                                 class="form-control" id="review" wire:model="comment" ></textarea>
                              <div class="row gutter-md">
                                 <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name"
                                       id="author" wire:model="user_name">
                                 </div>
                                 <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Email"
                                       id="email_1" wire:model="email">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                 <label for="save-checkbox">Save my name, email, and website in this
                                 browser for the next time I comment.</label>
                              </div>
                              <button type="submit" class="btn btn-dark"  >Submit Review</button>
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
                                       <!-- <div class="comment-action">
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
                                       </div> -->
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                        <div class="tab-pane" id="helpful-positive">
                           <ul class="comments list-style-none">
                              @forelse($helppositive as $positive)
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{ asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">{{$positive->user_name}}</a>
                                          <span class="comment-date">{{$positive->updated_at->format('d-F-Y, H:i')}}</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: {{$positive->review*20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>{{$positive->comment }}
                                       </p>
                                       <!-- <div class="comment-action">
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
                                       </div> -->
                                    </div>
                                 </div>
                              </li>
                              @empty
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src=""
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h3>No comment yet</h3>
                                    </div>
                                 </div>
                              </li>
                              @endforelse
                           </ul>
                        </div>
                        <div class="tab-pane" id="helpful-negative">
                           <ul class="comments list-style-none">
                              @forelse($helpnegative as $negative)
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{ asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">{{$negative->user_name}}</a>
                                          <span class="comment-date">{{$negative->updated_at->format('d-F-Y, H:i')}}</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: {{$negative->review*20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>{{$negative->comment }}
                                       </p>
                                       <!-- <div class="comment-action">
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
                                       </div> -->
                                    </div>
                                 </div>
                              </li>
                              @empty
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src=""
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h3>No comment yet</h3>
                                    </div>
                                 </div>
                              </li>
                              @endforelse
                           </ul>
                        </div>
                        <div class="tab-pane" id="highest-rating">
                           <ul class="comments list-style-none">
                           @forelse($highrate as $high)
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{ asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">{{$high->user_name}}</a>
                                          <span class="comment-date">{{$high->updated_at->format('d-F-Y, H:i')}}</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: {{$high->review*20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>{{$high->comment }}
                                       </p>
                                       <!-- <div class="comment-action">
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
                                       </div> -->
                                    </div>
                                 </div>
                              </li>
                              @empty
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src=""
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h3>No comment yet</h3>
                                    </div>
                                 </div>
                              </li>
                              @endforelse
                           </ul>
                        </div>
                        <div class="tab-pane" id="lowest-rating">
                           <ul class="comments list-style-none">
                           @forelse($lowrate as $low)
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src="{{ asset('frontend-assets/assets/images/agents/1-100x100.png')}}"
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h4 class="comment-author">
                                          <a href="#">{{$low->user_name}}</a>
                                          <span class="comment-date">{{$low->updated_at->format('d-F-Y, H:i')}}</span>
                                       </h4>
                                       <div class="ratings-container comment-rating">
                                          <div class="ratings-full">
                                             <span class="ratings" style="width: {{$low->review*20 }}%;"></span>
                                             <span class="tooltiptext tooltip-top"></span>
                                          </div>
                                       </div>
                                       <p>{{$low->comment }}
                                       </p>
                                       <!-- <div class="comment-action">
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
                                       </div> -->
                                    </div>
                                 </div>
                              </li>
                              @empty
                              <li class="comment">
                                 <div class="comment-body">
                                    <figure class="comment-avatar">
                                       <img src=""
                                          alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                       <h3>No comment yet</h3>
                                    </div>
                                 </div>
                              </li>
                              @endforelse
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
                                            'slidesPerView': 4
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 4
                                        }
                                    }
                                }">
               <div class="swiper-wrapper row cols-lg-3 cols-md-3 cols-sm-2 ">
                  @foreach($moreproducts as $unit)
                  <div class="swiper-slide product">
                     <figure class="product-media">
                        <a href="{{route('product',$unit->id)}}">
                        <img src="{{asset('storage/uploads/products/'.$unit->p_image)}}" alt="Product"
                           style="width:300px;height:300px" />
                        <img src="{{asset('storage/uploads/products/'.$unit->p_image)}}" alt="Product"
                        style="width:300px;height:300px" />
                        </a>
                        <div class="product-action-vertical">
                           <button type="button" title="Add to cart" class="btn-product-icon btn-cart w-icon-cart" wire:click="addtocart({{ $unit->id }})">
                           <button type="button" class="btn-product-icon btn-wishlist w-icon-heart" wire:click="addToWish({{ $unit->id }})"><span></span></button>


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
                                            'slidesPerView': 4
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 4
                                        }
                                    }
                                }">
               <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 ">
                  @foreach($related_products as $related)
                  <div class="swiper-slide product">
                     <figure class="product-media">
                        <a href="{{ route('product', $related->id) }}">
                        <img src="{{asset('storage/uploads/products/'.$related->p_image)}}" alt="Product"
                        style="width:300px;height:300px" />
                        </a>
                        <div class="product-action-vertical">
                           <button type="button" title="Add to cart" class="btn-product-icon btn-cart w-icon-cart" wire:click="addtocart({{ $related->id }})">
                           <button type="button" class="btn-product-icon btn-wishlist w-icon-heart" wire:click="addToWish({{ $related->id }})"><span></span></button>
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