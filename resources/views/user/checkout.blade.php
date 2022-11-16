@extends('user.layouts.app')
@section('content')
<style>
.alert-danger{
    color: red;
}
</style>
<!-- Start of Main -->
<main class="main checkout">
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav">
      <div class="container">
         <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
            <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
            <li><a href="javascript:void(0)">Order Complete</a></li>
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
               If you are a new customer, please proceed to the Billing section.
            </p>
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
         <form class="form checkout-form require-validation" 
            action="{{route('place')}}" 
            method="post" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
            @csrf
            <div class="row mb-9">
               <div class="col-lg-7 pr-lg-4 mb-4">
                  <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                     Billing Details
                  </h3>
                  <div class="row gutter-sm">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label>First name <span class="alert-danger">*</span></label>
                           <input type="text" class="form-control form-control-md required" name="fname"
                              value="">
                              @error('fname')
                              <p class="alert-danger">{{ $message }}</p>
                              @enderror
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label>Last name<span class="alert-danger">*</span></label>
                           <input type="text" class="form-control form-control-md required" name="lname"
                              value="" >
                           @error('lname')
                           <p class="alert-danger">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Company name (optional)</label>
                     <input type="text" class="form-control form-control-md" name="company" value="">
                  </div>
                  <div class="form-group">
                     <label>Country / Region <span class="alert-danger">*</span></label>
                     <div class="select-box">
                        <select name="country" class="form-control form-control-md required">
                           <option value="uk">United Kingdom (UK)</option>
                           <option value="us">United States</option>
                           <option value="fr">France</option>
                           <option value="aus">Australia</option>
                        </select>
                        @error('country')
                           <p class="alert-danger">{{ $message }}</p>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Street address <span class="alert-danger">*</span></label>
                     <input type="text" placeholder="House number and street name"
                        class="form-control form-control-md required mb-2" name="street" value="" >
                        @error('street')
                           <p class="alert-danger">{{ $message }}</p>
                        @enderror
                     <input type="text" placeholder="Apartment, suite, unit, etc. (required)"
                        class="form-control form-control-md" name="apart" value="">
                        @error('apart')
                           <p class="alert-danger">{{ $message }}</p>
                        @enderror
                  </div>
                  <div class="row gutter-sm">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Town / City <span class="alert-danger">*</span></label>
                           <input type="text" class="form-control form-control-md required" name="city" value="" >
                           @error('city')
                              <p class="alert-danger">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label>ZIP <span class="alert-danger">*</span></label>
                           <input type="text" class="form-control form-control-md required" name="zip" value="" >
                           @error('zip')
                              <p class="alert-danger">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>State <span class="alert-danger">*</span></label>
                           <div class="select-box">
                              <select name="state" class="form-control form-control-md required">
                                 <option value="" selected="selected">California</option>
                                 <option value="uk">United Kingdom (UK)</option>
                                 <option value="us">United States</option>
                                 <option value="fr">France</option>
                                 <option value="aus">Australia</option>
                              </select>
                              @error('state')
                                 <p class="alert-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Phone <span class="alert-danger">*</span></label>
                           <input type="text" class="form-control form-control-md required" value="" name="phone" >
                           @error('phone')
                              <p class="alert-danger">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="form-group mb-7">
                     <label>Email address <span class="alert-danger">*</span></label>
                     <input type="email" class="form-control form-control-md required" name="email" >
                     @error('email')
                        <p class="alert-danger">{{ $message }}</p>
                     @enderror
                  </div>
                  <div class="form-group checkbox-toggle pb-2">
                     <input type="checkbox" class="custom-checkbox" id="shipping-toggle" name="checkbox" vlaue="checkbox">
                     <label for="shipping-toggle">Ship to a different address?</label>
                  </div>
                  <div class="checkbox-content">
                     <div class="row gutter-sm">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label>First name <span class="alert-danger">*</span></label>
                              <input type="text" class="form-control form-control-md" name="s_fname"
                                 value="" >
                              @error('s_fname')
                                 <p class="alert-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label>Last name <span class="alert-danger">*</span></label>
                              <input type="text" class="form-control form-control-md" name="s_lname"
                                 value="" >
                              @error('s_lname')
                                 <p class="alert-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Company name (optional)</label>
                        <input type="text" class="require form-control form-control-md" name="s_company" value="">
                     </div>
                     <div class="form-group">
                        <label>Country / Region <span class="alert-danger">*</span></label>
                        <div class="select-box">
                           <select name="s_country" class="require form-control form-control-md">
                              <option value="uk">United Kingdom (UK)</option>
                              <option value="us">United States</option>
                              <option value="fr">France</option>
                              <option value="aus">Australia</option>
                           </select>
                           @error('s_country')
                              <p class="alert-danger">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Street address <span class="alert-danger">*</span></label>
                        <input type="text" placeholder="House number and street name"
                           class="require form-control form-control-md mb-2" name="s_street" value="">
                        @error('s_street')
                           <p class="alert-danger">{{ $message }}</p>
                        @enderror
                        <input type="text" placeholder="Apartment, suite, unit, etc. (required)"
                           class="require form-control form-control-md" name="s_apart" value="" >
                        @error('s_apart')
                           <p class="alert-danger">{{ $message }}</p>
                        @enderror
                     </div>
                     <div class="row gutter-sm">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Town / City <span class="alert-danger">*</span></label>
                              <input type="text" class="require form-control form-control-md" name="s_city" value="">
                              @error('s_city')
                                 <p class="alert-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <div class="form-group">
                              <label>Postcode <span class="alert-danger">*</span></label>
                              <input type="text" class="require form-control form-control-md" name="s_zip" value="" >
                              @error('s_zip')
                              <p class="alert-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Country<span class="alert-danger">*</span></label>
                              <input type="text" class="require form-control form-control-md" name="s_state" value="">
                              @error('s_state')
                                 <p class="alert-danger">{{ $message }}</p>
                              @enderror
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
                                 <td class="product-total">pkr{{$cart->quantity * $cart->p_new_price}}</td>
                              </tr>
                              <?php $subtotal = $subtotal + $cart->quantity * $cart->p_new_price; ?>
                              @endforeach
                              <tr class="cart-subtotal bb-no">
                                 <td>
                                    <b>Subtotal</b>
                                 </td>
                                 <td>
                                    <b>pkr{{$subtotal}}</b>
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
                                    <b>pkr{{$subtotal}}</b>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                        <br><br>  
                        <!-- <div>
                           <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                           <br>
                           <label>
                               <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Check Payment</label><br>
                           <label>
                               <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Cash On Delivery</label><br>
                           <label>
                               <input type="checkbox" class="radio" value="1" name="fooby[1][]" />&nbsp;&nbsp;Bank Transfer</label>
                               <a class="Click-here"> Click this to direct Bank Transfer</a>
                           </div> -->
                        <div class="payment-methods" id="payment_method">
                           <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                           <div class="accordion payment-accordion">
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
                                    <a href="#delivery" class="expand">Pay with Card</a>
                                 </div>
                                 <div id="delivery" class="card-body collapsed">
                                    <br>                                 
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Add Your Card Detail Here</h4>
                                    <br>
                                    <div class="form-group">
                                        <input class="form-control form-control-md" type="text" size="4" placeholder="Name on card">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control card-number form-control-md" type="text" size="20" placeholder="Card No">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control card-cvc form-control-md" type="text" size="4" placeholder="cvc">
                                    </div>                                   
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input class="form-control form-control-md" type="datetime-local" name="Expiry Date" placeholder="Expiry Date">
                                    </div> -->

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
                        </div>
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
   <!-- <div class="Click-here">Click Here</div>
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
                     <input class="form-control form-control-md required" type="text" name="Name" placeholder="Name">
                  </div>
                  <div class="form-group">
                     <input class="form-control form-control-md required" type="text" name="Name" placeholder="Card No">
                  </div>
                  <div class="form-group">
                     <input class="form-control form-control-md required" type="text" name="Name" placeholder="CCVV">
                  </div>
                  <div class="form-group">
                     <input class="form-control form-control-md required" type="datetime-local" name="Expiry Date" placeholder="Expiry Date">
                  </div>
                  <button type="submit" class="btn btn-dark btn-outline btn-rounded">Add 
                  </button>
               </form>
            </div>
         </div>
      </div>
      <div class="bg-overlay"></div>
   </div> -->
</main>
<!-- End of Main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- start stripe -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>    
<script type="text/javascript"> 
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>

<!-- end stripe -->
<!-- 
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
   
</script> -->
@endsection