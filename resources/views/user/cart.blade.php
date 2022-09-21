@extends('user.layouts.app')

@section('content')




  <!-- Start of Main -->
  <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active"><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                        <form action="{{route('update')}}" method="post">
                            @csrf
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $subtotal= 0; ?>
                                    @forelse($carts as $cart)
                                    <tr id="setup_{{$cart->id}}" class="data_row">
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="javascript:void(0)" class="btn btn-close" onclick="deleteProduct({{$cart->prod_id}})">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a href="{{ route('product',$cart['prod_id'])}}">
                                                    <figure>
                                                        <img src="{{asset('storage/uploads/products/'.$cart['p_image'])}}" alt="product"
                                                            width="300" height="338">
                                                    </figure>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="product-default.html">
                                                {{$cart['p_name']}}
                                            </a>
                                        </td>
                                        <td class="product-price"><span class="amount">${{$cart['p_new_price']}}</span></td>
                                        <td class="product-quantity">
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="{{$cart['prod_id']}}">
                                                <input id="" class="quantity form-control" name="qnty" type="number" min="1" max="100000" value="{{$cart['quantity']}}">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">${{$cart['p_new_price'] * $cart['quantity']}}</span>
                                        </td>
                                    </tr>
                                    <?php $subtotal = $subtotal + $cart['p_new_price'] * $cart['quantity'] ?>
                                    @empty
                                    <tr>
                                        <a href="{{route('shop')}}"><h4>Your cart is empty</h4></a>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="{{route('shop')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <a href="javascript:void(0)" class="btn btn-rounded btn-default btn-clear" onclick="clearall()">Clear Cart</a>
                                <button type="submit" class="btn btn-rounded btn-update">Update Cart</button>
                            </div>
                            </form>
                            <div class="coupon">
                                <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                                <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required />
                                <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                            </div>
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>${{$subtotal}}</span>
                                    </div>

                                    <hr class="divider">

                                    <ul class="shipping-methods mb-2">
                                        <li>
                                            <label
                                                class="shipping-title text-dark font-weight-bold">Shipping</label>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="free-shipping" class="custom-control-input"
                                                    name="shipping">
                                                <label for="free-shipping"
                                                    class="custom-control-label color-dark">Free
                                                    Shipping</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="local-pickup" class="custom-control-input"
                                                    name="shipping">
                                                <label for="local-pickup"
                                                    class="custom-control-label color-dark">Local
                                                    Pickup</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="flat-rate" class="custom-control-input"
                                                    name="shipping">
                                                <label for="flat-rate" class="custom-control-label color-dark">Flat
                                                    rate:
                                                    $5.00</label>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="shipping-calculator">
                                        <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                                        <form class="shipping-calculator-form">
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="country" class="form-control form-control-md">
                                                        <option value="default" selected="selected">United States
                                                            (US)
                                                        </option>
                                                        <option value="us">United States</option>
                                                        <option value="uk">United Kingdom</option>
                                                        <option value="fr">France</option>
                                                        <option value="aus">Australia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="state" class="form-control form-control-md">
                                                        <option value="default" selected="selected">California
                                                        </option>
                                                        <option value="ohaio">Ohaio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text"
                                                    name="town-city" placeholder="Town / City">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text"
                                                    name="zipcode" placeholder="ZIP">
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                                Totals</button>
                                        </form>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50">${{$subtotal}}</span>
                                    </div>
                                    <a href="{{ route('checkout')}}"
                                        class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">

function deleteProduct(id){
            // processing ajax request    
            $.ajax({
                url: "{{ url('remove_item') }}" +'/' + id,
            success: function() {
                    $("#setup_" +id).remove();
                }
            });   
        }

function clearall(){

        $.ajax({
            url: "{{ route('clear_cart') }}",
        success: function() {
                $(".data_row").remove();
            }
        });
}
//https://www.youtube.com/watch?v=eblMZxwP1eY
//for update quantity...
</script>

@endsection
