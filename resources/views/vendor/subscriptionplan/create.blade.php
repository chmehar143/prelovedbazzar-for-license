@extends('vendor.layouts.app')
@section('content')
<head>
   <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Subscription Plan  </h1>
         <!--end::Title-->
         <!--begin::Separator-->
         <span class="h-20px border-gray-200 border-start mx-3"></span>
         <!--end::Separator-->
         <!--begin::Breadcrumb-->
         <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">  Plan   </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> Subscription Plan Create </li>
            <!--end::Item-->
         </ul>
         <!--end::Breadcrumb-->
      </div>
      <!--begin::Page title-->
      <div class="flex-grow-1 flex-shrink-0 me-5">
         <!--begin::Page title-->
         <!--end::Page title-->
      </div>
      <!--end::Page title-->
   </div>
   <!--end::Container-->
</div>
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:8pc" id="kt_content">
   <!--begin::Container-->
   <div class="container-fluied">
      <div id="kt_content_container" class="container-xl" >
         <!--begin::Navbar-->
         <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
               <!--begin::Card title-->
               <div class="card-title">
                  <h2 class="fw-bolder mb-0">View  Subscription Plan</h2>
               </div>
               <!--end::Card title-->
               <!--begin::Card toolbar-->
               <div class="card-toolbar">
               </div>
               <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div id="kt_customer_view_payment_method" class="card-body pt-0">
               <!--begin::Option-->
               <div class="py-0" data-kt-customer-payment-method="row">
                  <!--begin::Header-->
                  <!--begin::Body-->
                  <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                     <!--begin::Details-->
                     <div class="d-flex flex-wrap py-5">
                        <!--begin::Col-->
                        <div class="flex-equal me-5">
                           <table class="table table-flush fw-bold gy-1">
                              <tbody>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px">User Name</td>
                                    <td class="text-gray-800">John</td>
                                 </tr>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px">Card Holder Name</td>
                                    <td class="text-gray-800">jOHN VON</td>
                                 </tr>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px">Card No</td>
                                    <td class="text-gray-800">1323-3232-3232</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="flex-equal">
                           <table class="table table-flush fw-bold gy-1">
                              <tbody>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px"> Month </td>
                                    <td class="text-gray-800">1000</td>
                                 </tr>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px"> Year </td>
                                    <td class="text-gray-800">2023</td>
                                 </tr>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px"> Month </td>
                                    <td class="text-gray-800">12</td>
                                 </tr>
                                 <tr>
                                    <td class="text-muted min-w-125px w-125px">Status </td>
                                    <td class="text-gray-800">
                                       Approved
                                       <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                       <span class="svg-icon svg-icon-2 svg-icon-success">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                             <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                             <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                          </svg>
                                       </span>
                                       <!--end::Svg Icon-->
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Details-->
                  </div>
                  <!--end::Body-->
               </div>
               <!--end::Option-->
            </div>
            <!--end::Card body-->
         </div>
      </div>
      <div id="kt_content_container" class="container-xl" >
         <!--begin::Navbar-->
         <div class="card mb-5 mb-xl-10">
         </div>
         <!--end::Navbar-->
         <!--begin::Basic info-->
         <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                  <h2 class="mt-5">Pay (${{$plan->cost}}) for ({{$plan->title}}) subscription</h2>
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
               <!--begin::Form-->
               <form id="kt_account_profile_details_form" class="form require-validation" 
                  action="{{ route('vendor.subscriptionplan_get', $plan->id) }}" 
                  method="post" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                  @csrf
                  <!--begin::Card body-->
                  <div class="card-body border-top p-9">
                     <!--begin::Input group-->
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">vendor name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                           <!--begin::Row-->
                           <div class="row">
                              <!--begin::Col-->
                              <div class="col-lg-12 fv-row">
                                 <input type="text" name="vendor" value="{{ Auth::guard('vendor')->user()->name }}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" disabled/>
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <!--end::Col-->
                           </div>
                           <!--end::Row-->
                        </div>
                        <!--end::Col-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Card Holder Name  </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                           <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Card Holder Name   " />
                        </div>
                        <!--end::Col-->
                     </div>
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Card No </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                           <input type="text" class="card-number form-control form-control-lg form-control-solid" placeholder="Card No"  />
                        </div>
                        <!--end::Col-->
                     </div>
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Month </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                           <input type="text" class="card-expiry-month form-control form-control-lg form-control-solid" placeholder="Month "  />
                        </div>
                        <!--end::Col-->
                     </div>
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Year </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                           <input type="text" class="card-expiry-year form-control form-control-lg form-control-solid" placeholder="Year" />
                        </div>
                        <!--end::Col-->
                     </div>
                     <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">CVV </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                           <input type="text" class="card-cvc form-control form-control-lg form-control-solid" placeholder="CVV" />
                        </div>
                        <!--end::Col-->
                     </div>
                  </div>
                  <!--end::Card body-->
                  <!--begin::Actions-->
                  <div class="card-footer d-flex justify-content-end py-6 px-9">
                     <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                     <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                  </div>
                  <!--end::Actions-->
               </form>
               <!--end::Form-->
            </div>
            <!--end::Content-->
         </div>
         <!--end::Modals-->
      </div>
   </div>
</div>
</div>
<!--end::Container-->
</div>
<script>
   ClassicEditor
   	.create( document.querySelector( '#editor' ) )
   	.catch( error => {
   		console.error( error );
   	} );
</script>
<script>
   ClassicEditor
   	.create( document.querySelector( '#editornew' ) )
   	.catch( error => {
   		console.error( error );
   	} );
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
@endsection