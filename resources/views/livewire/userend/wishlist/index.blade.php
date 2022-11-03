<div class="container">
    <h3 class="wishlist-title">My wishlist</h3>
    <table class="shop-table wishlist-table">
        <thead>
            <tr>
                <th class="product-name"><span>Product</span></th>
                <th></th>
                <th class="product-price"><span>Price</span></th>
                <th class="product-stock-status"><span>Stock Status</span></th>
                <th class="wishlist-action">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wishes as $wish)
            <tr id="setup_{{$wish->id}}">
                <td class="product-thumbnail">
                    <div class="p-relative">
                        <a href="product-default.html">
                            <figure>
                                <img src="{{asset('storage/uploads/products/'.$wish->p_image)}}" alt="product" width="300"
                                    height="338">
                            </figure>
                        </a>
                        <button type="button" class="btn btn-close" wire:click="removelist({{$wish->id}})">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </td>
                <td class="product-name">
                    <a href="product-default.html">
                        {{$wish->p_name}}
                    </a>
                </td>
                <td class="product-price">
                    <ins class="new-price">pkr{{$wish->p_new_price}}</ins>
                </td>
                <td class="product-stock-status">
                    <span class="wishlist-in-stock">@if($wish->p_stock > 1) In Stock  @endif</span>
                </td>
                <td class="wishlist-action">
                    <div class="d-lg-flex">
                        <a href="{{ route('product', $wish->p_id) }}"
                            class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">
                            View</a>
                        <button type="button" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart" wire:click="addtocart({{ $wish->p_id }})">Add to Cart </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$wishes->links()}}
    <!-- <div class="social-links">
        <label>Share On:</label>
        <div class="social-icons social-no-color border-thin">
            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
            <a href="#" class="social-icon social-email far fa-envelope"></a>
            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
        </div>
    </div> -->
</div>
