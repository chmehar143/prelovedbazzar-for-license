@extends('user.layouts.app')

@section('content')
<head>
    <Style>

.Click-here {
  cursor: pointer;
  color: black;
  text-decoration:underline;
  width: 180px;
  text-align: center;
  font-size:16px;
  padding: 18px 0;
  margin: 0 auto;
  transition:background-image 3s ease-in-out;
}

.custom-model-main {
  text-align: center;
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0; /* z-index: 1050; */
  -webkit-overflow-scrolling: touch;
  outline: 0;
  opacity: 0;
  -webkit-transition: opacity 0.15s linear, z-index 0.15;
  -o-transition: opacity 0.15s linear, z-index 0.15;
  transition: opacity 0.15s linear, z-index 0.15;
  z-index: -1;
  overflow-x: hidden;
  overflow-y: auto;
}

.model-open {
  z-index: 99999;
  opacity: 1;
  overflow: hidden;
}
.custom-model-inner {
  -webkit-transform: translate(0, -25%);
  -ms-transform: translate(0, -25%);
  transform: translate(0, -25%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: -webkit-transform 0.3s ease-out;
  -o-transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  display: inline-block;
  vertical-align: middle;
  width: 600px;
  margin: 30px auto;
  max-width: 97%;
}
.custom-model-wrap {
  display: block;
  width: 100%;
  position: relative;
  background-color: #fff;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 6px;
  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  background-clip: padding-box;
  outline: 0;
  text-align: left;
  padding: 20px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  max-height: calc(100vh - 70px);
	overflow-y: auto;
}
.model-open .custom-model-inner {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  position: relative;
  z-index: 999;
}
.model-open .bg-overlay {
  background: rgba(0, 0, 0, 0.6);
  z-index: 99;
}
.bg-overlay {
  background: rgba(0, 0, 0, 0);
  height: 100vh;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
  -webkit-transition: background 0.15s linear;
  -o-transition: background 0.15s linear;
  transition: background 0.15s linear;
}
.close-btn {
  position: absolute;
  right: 0;
  top: -30px;
  cursor: pointer;
  z-index: 99;
  font-size: 30px;
  color: #fff;
}

@media screen and (min-width:800px){
	.custom-model-main:before {
	  content: "";
	  display: inline-block;
	  height: auto;
	  vertical-align: middle;
	  margin-right: -0px;
	  height: 100%;
	}
}
@media screen and (max-width:799px){
  .custom-model-inner{margin-top: 45px;}
}

 
        </style>
</head>
      <!-- Start of Main -->
      <main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="cart.html">Shopping Cart</a></li>
                        <li class="active"><a href="checkout.html">Checkout</a></li>
                        <li><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    @if(!Auth::guard('user'))
                    <div class="login-toggle">
                        Returning customer? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content">
                        <p>If you have shopped with us before, please enter your details below.
                            If you are a new customer, please proceed to the Billing section.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control form-control-md" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" class="form-control form-control-md" name="password"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="#" class="ml-3">Last your password?</a>
                        </div>
                        <button class="btn btn-rounded btn-login">Login</button>
                    </form>
                    @endif
                    <div class="coupon-toggle">
                        Have a coupon? <a href="#"
                            class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                            code</a>
                    </div>
                    <div class="coupon-content mb-4">
                        <p>If you have a coupon code, please apply it below.</p>
                        <div class="input-wrapper-inline">
                            <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                            <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                        </div>
                    </div>
                    <form class="form checkout-form" action="{{route('place')}}" method="post">
                        @csrf
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Billing Details
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input type="text" class="form-control form-control-md" name="firstname"
                                              value=""  required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input type="text" class="form-control form-control-md" name="lastname"
                                            value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Company name (optional)</label>
                                    <input type="text" class="form-control form-control-md" name="company" value="">
                                </div>
                                <div class="form-group">
                                    <label>Country / Region *</label>
                                    <div class="select-box">
                                        <select name="country" class="form-control form-control-md">
                                            <option value="uk">United Kingdom (UK)</option>
                                            <option value="us">United States</option>
                                            <option value="fr">France</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Street address *</label>
                                    <input type="text" placeholder="House number and street name"
                                        class="form-control form-control-md mb-2" name="street-1" value="" required>
                                    <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                        class="form-control form-control-md" name="street-2" value="" required>
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Town / City *</label>
                                            <input type="text" class="form-control form-control-md" name="town" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ZIP *</label>
                                            <input type="text" class="form-control form-control-md" name="zip" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State *</label>
                                            <div class="select-box">
                                                <select name="state" class="form-control form-control-md">
                                                    <option value="" selected="selected">California</option>
                                                    <option value="uk">United Kingdom (UK)</option>
                                                    <option value="us">United States</option>
                                                    <option value="fr">France</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input type="text" class="form-control form-control-md" value="" name="phone" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-7">
                                    <label>Email address *</label>
                                    <input type="email" class="form-control form-control-md" name="email" value="" required>
                                </div>
                                <div class="form-group checkbox-toggle pb-2">
                                    <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                        name="checkbox">
                                    <label for="shipping-toggle">Ship to a different address?</label>
                                </div>
                                <div class="checkbox-content">
                                    <div class="row gutter-sm">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>First name *</label>
                                                <input type="text" class="form-control form-control-md" name="s_fname"
                                                value=""  >
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>Last name *</label>
                                                <input type="text" class="form-control form-control-md" name="s_lname"
                                                value="" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Company name (optional)</label>
                                        <input type="text" class="require form-control form-control-md" name="s_company" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Country / Region *</label>
                                        <div class="select-box">
                                            <select name="s_country" class="require form-control form-control-md">
                                                <option value="uk">United Kingdom (UK)</option>
                                                <option value="us">United States</option>
                                                <option value="fr">France</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Street address *</label>
                                        <input type="text" placeholder="House number and street name"
                                            class="require form-control form-control-md mb-2" name="s_street" value="">
                                        <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                            class="require form-control form-control-md" name="s_apart" value="" >
                                    </div>
                                    <div class="row gutter-sm">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Town / City *</label>
                                                <input type="text" class="require form-control form-control-md" name="s_city" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Postcode *</label>
                                                <input type="text" class="require form-control form-control-md" name="s_zip" value="" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country (optional)</label>
                                                <input type="text" class="require form-control form-control-md" name="s_state" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="order-notes">Order notes (optional)</label>
                                    <textarea class="require form-control mb-0" id="order-notes" name="note" cols="30"
                                        rows="4"
                                        placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                                <div class="form-group pb-2">
                                    <input type="checkbox" class="custom-checkbox" name="save_address" >
                                    <label for="shipping-toggle">Remember address for next orders?</label>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="order-summary-wrapper sticky-sidebar">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $subtotal = 0;?>
                                                @foreach($carts as $cart)
                                                <tr class="bb-no">
                                                    <td class="product-name">{{$cart->p_name}} <i
                                                            class="fas fa-times"></i> <span
                                                            class="product-quantity">{{$cart->quantity}}</span></td>
                                                    <td class="product-total">${{$cart->quantity * $cart->p_new_price}}</td>
                                                </tr>
                                                <?php $subtotal = $subtotal + $cart->quantity * $cart->p_new_price; ?>
                                                @endforeach
                                                <tr class="cart-subtotal bb-no">
                                                    <td>
                                                        <b>Subtotal</b>
                                                    </td>
                                                    <td>
                                                        <b>${{$subtotal}}</b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="shipping-methods">
                                                    <td colspan="2" class="text-left">
                                                        <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                        </h4>
                                                        <ul id="shipping-method" class="mb-4">
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="free-shipping"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="free-shipping"
                                                                        class="custom-control-label color-dark">Free
                                                                        Shipping</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="local-pickup"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="local-pickup"
                                                                        class="custom-control-label color-dark">Local
                                                                        Pickup</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="flat-rate"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="flat-rate"
                                                                        class="custom-control-label color-dark">Flat
                                                                        rate: $5.00</label>
                                                                </div>
                                                            </li>
                                                           

                                                        </ul>
                                                    </td>
                                                </tr>
                                                
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td>
                                                        <b>${{$subtotal}}</b>
                                                    </td>
                                                </tr>

                                            </tfoot>
                                        </table>
<br><br>  
                                        <div>
                                       
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <br>
                                        <label>
                                            <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Check Payment</label><br>
                                        <label>
                                            <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Cash On Delivery</label><br>
                                        <label>
                                            <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Bank Transfer</label>
                                            <a class="Click-here"> Click this to direct Bank Transfer</a>
                                        </div>
                                        <!-- 
                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                            <div class="accordion payment-accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#cash-on-delivery" class="collapse">Direct Bank Transfor</a>
                                                    </div>
                                                    <div id="cash-on-delivery" class="card-body expanded">
                                                        <p class="mb-0">
                                                            Make your payment directly into our bank account.
                                                            Please use your Order ID as the payment reference.
                                                            Your order will not be shipped until the funds have cleared in our account.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#payment" class="expand">Check Payments</a>
                                                    </div>
                                                    <div id="payment" class="card-body collapsed">
                                                        <p class="mb-0">
                                                            Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#delivery" class="expand">Cash on delivery</a>
                                                    </div>
                                                    <div id="delivery" class="card-body collapsed">
                                                        <p class="mb-0">
                                                            Pay with cash upon delivery.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card p-relative">
                                                    <div class="card-header">
                                                        <a href="#paypal" class="expand">Paypal</a>
                                                    </div>
                                                    <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que"
                                                        onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                        'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700');
                                                        return false;">What is PayPal?
                                                    </a>
                                                    <div id="paypal" class="card-body collapsed">
                                                        <p class="mb-0">
                                                            Pay via PayPal, you can pay with your credit cart if you
                                                            don't have a PayPal account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group place-order pt-6">
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of PageContent -->
        <!-- End of Main -->
           
        <div class="Click-here">Click Here</div>        
<div class="custom-model-main">
    <div class="custom-model-inner">        
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">

            <form class="shipping-calculator-form">
                <br>                                 
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">PaymeAdd Your Account Details</h4>
                                        <br>
                                                
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="Name" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="Name" placeholder="Card No">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="Name" placeholder="CCVV">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="datetime-local" name="Expiry Date" placeholder="Expiry Date">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">Add 
                                                </button>
                                        </form>
                                    </div>
                                </div> 
                          </div> 
       
    <div class="bg-overlay"></div>

</div> 
        </main>
       
        <!-- End of Main -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <Script>
           
            $("input:checkbox").on('click', function() {
            var $box = $(this);
            if ($box.is(":checked")) {
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
            });
            </script>
            <script>
                $(".Click-here").on('click', function() {
                $(".custom-model-main").addClass('model-open');
                }); 
                $(".close-btn, .bg-overlay").click(function(){
                $(".custom-model-main").removeClass('model-open');
                });

                </script>
@endsection
