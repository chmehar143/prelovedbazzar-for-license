<div>
<div class="page-content mb-10">
      <div class="container">
         <!-- Start of Shop Content -->
         <div class="shop-content row gutter-lg">
            <!-- Start of Sidebar, Shop Sidebar -->
            <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
               <!-- Start of Sidebar Overlay -->
               <div class="sidebar-overlay"></div>
               <a class="sidebar-close" href="javascript:void(0)"><i class="close-icon"></i></a>
               <!-- Start of Sidebar Content -->
               <div class="sidebar-content scrollable">
                  <!-- Start of Sticky Sidebar -->
                  <div class="sticky-sidebar">
                     <!-- <div class="filter-actions">
                        <label>Filter :</label>
                        <a href="javascript:void(0)" class="btn btn-dark btn-link filter-clean">Clean All</a>
                        </div> -->
                     <!-- Start of Collapsible widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>All Categories</span></h3>
                        <ul class="widget-body filter-items search-ul" style="display:none;">
                           @foreach($categories as $category)
                           <li>
                              <a href="{{ route('sortby',$category->id ) }}">{{$category->name}}</a>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Price</span></h3>
                        <div class="widget-body" style="display:none;">
                           <ul class="filter-items search-ul" >
                              <?php $min = 1; $max = 99.0; ?>
                              <li><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}">Pkr0.00 - $99.99</a></li>
                              <?php $min = 99.00; $max = 199.00; ?>
                              <li><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}">Pkr99.99 - $199.99</a></li>
                              <?php $min = 199.00; $max = 299.00; ?>
                              <li><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}">Pkr199.99 - $299.99</a></li>
                              <?php $min = 299.99; $max = 499.99; ?>
                              <li><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}">Pkr299.99 - $499.99</a></li>
                              <?php $min = 499.99; $max = 99999999.00; ?>
                              <li><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}">Pkr500.00+</a></li>
                           </ul>
                           <!-- <form class="price-range">
                              <input type="number" name="min_price" class="min_price text-center"
                                  placeholder="$min"><span class="delimiter">-</span><input
                                  type="number" name="max_price" class="max_price text-center"
                                  placeholder="$max"><a href="{{ route('sort_price', ['min' => $min, 'max' => $max] ) }}"
                                  class="btn btn-primary btn-rounded">Go</a>
                              </form> -->
                        </div>
                     </div>
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <!-- <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Size</span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                            <li><a href="javascript:void(0)">Extra Large</a></li>
                            <li><a href="javascript:void(0)">Large</a></li>
                            <li><a href="javascript:void(0)">Medium</a></li>
                            <li><a href="javascript:void(0)">Small</a></li>
                        </ul>
                        </div> -->
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <!-- <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Brand</span></h3>
                        <ul class="widget-body filter-items item-check mt-1">
                            <li><a href="javascript:void(0)">Elegant Auto Group</a></li>
                            <li><a href="javascript:void(0)">Green Grass</a></li>
                            <li><a href="javascript:void(0)">Node Js</a></li>
                            <li><a href="javascript:void(0)">NS8</a></li>
                            <li><a href="javascript:void(0)">Red</a></li>
                            <li><a href="javascript:void(0)">Skysuite Tech</a></li>
                            <li><a href="javascript:void(0)">Sterling</a></li>
                        </ul>
                        </div> -->
                     <!-- End of Collapsible Widget -->
                     <!-- Start of Collapsible Widget -->
                     <!-- <div class="widget widget-collapsible">
                        <h3 class="widget-title"><span>Color</span></h3>
                        <ul class="widget-body filter-items item-check">
                            <li><a href="javascript:void(0)">Black</a></li>
                            <li><a href="javascript:void(0)">Blue</a></li>
                            <li><a href="javascript:void(0)">Brown</a></li>
                            <li><a href="javascript:void(0)">Green</a></li>
                            <li><a href="javascript:void(0)">Grey</a></li>
                            <li><a href="javascript:void(0)">Orange</a></li>
                            <li><a href="javascript:void(0)">Yellow</a></li>
                        </ul>
                        </div> -->
                     <!-- End of Collapsible Widget -->
                  </div>
                  <!-- End of Sidebar Content -->
               </div>
               <!-- End of Sidebar Content -->
            </aside>
            <!-- End of Shop Sidebar -->
            <!-- Start of Main Content -->
            <div class="main-content">
               <!-- Start of Shop Banner -->
               <!-- End of Shop Banner -->
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
               <div>
                  {{ $products->links() }}
               </div>
            </div>
            <!-- End of Main Content -->
         </div>
         <!-- End of Shop Content -->
      </div>
   </div>
   <div class="container">
   </div>
</div>

