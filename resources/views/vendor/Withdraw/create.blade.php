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
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc">  Withdraw </h1>
         <!--end::Title-->
         <!--begin::Separator-->
         <span class="h-20px border-gray-200 border-start mx-3"></span>
         <!--end::Separator-->
         <!--begin::Breadcrumb-->
         <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-2">
            <!--begin::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted"> Withdraw </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Add  Withdraw  </li>
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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top:7pc">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl">
      <!--begin::Navbar-->
      <div class="card mb-5 mb-xl-10">
      </div>
      <!--end::Navbar-->
      <!--begin::Basic info-->
      <div class="card mb-5 mb-xl-10">
         <!--begin::Card header-->
         <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Add Withdraw Details</h3>
            </div>
            <!--end::Card title-->
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="{{ route('vendor.withdraw_store') }}" id="kt_account_profile_details_form" class="form" method="post">
               @csrf
               <!--begin::Card body-->
               <div class="card-body border-top p-9">
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                     <span class="required">Withdraw Method                                                     </span>
                     <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <select id="method" name="method" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Withdraw Method 
                           ..." class="@error('method') is-invalid @enderror form-select form-select-solid form-select-lg fw-bold">
                           <option value="">Withdraw Method...</option>
                           <option data-kt-flag="flags/afghanistan.svg" value="0" >paypal</option>
                           <option data-kt-flag="flags/venezuela.svg" value="1" >payoneer</option>
                           <option data-kt-flag="flags/venezuela.svg" value="2" >Via Bank</option>
                        </select>
                        @error('method')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label id="payment" class="col-lg-4 col-form-label required fw-bold fs-6">enter account id or IBAN</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" id="paywith" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="enter your account id or IBAN" required />
                              @error('unknown')
                                 <div class="validation mt-1 text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">Enter Bank name (if any)</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" name="bnk_name" class="@error('p_stock') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                              @error('bnk_name')
                                 <div class="validation mt-1 text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Withdraw Amount</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" name="amount" 
                                 class="@error('amount') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                 placeholder="maximum limit is {{$amount*7/10}}" />
                                 @error('amount')
                                    <div class="validation mt-1 text-danger">{{ $message }}</div>
                                 @enderror
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Enter email address</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="email" name="email" value="{{$vendor->email}}" class="@error('email') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                              @error('email')
                                 <div class="validation mt-1 text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Enter your phone number</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" />
                              @error('phone')
                                 <div class="validation mt-1 text-danger">{{ $message }}</div>
                              @enderror
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <!--end::Col-->
                        </div>
                        <!--end::Row-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label  fw-bold fs-6">Additional Reference(Optional)
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <textarea name="other" id="editor">
                        </textarea>
                     </div>
                     <!--end::Col-->
                  </div>
               </div>
               <!--end::Card body-->
               <!--begin::Actions-->
               <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                  <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Apply</button>
               </div>
               <!--end::Actions-->
            </form>
            <!--end::Form-->
         </div>
         <!--end::Content-->
      </div>
      <!--end::Modals-->
   </div>
   <!--end::Container-->
</div>
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
<!--end::Scr--->



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
   $(document).ready(function(){
      $('#method').change(function(){
         let mid=$(this).val();

         if(mid == 0)
         {
            $('label#payment').empty();

        	   $('label#payment').prepend("Please enter you paypal account id");
            $('#paywith').attr('name', 'paypal');

            $('#paywith').addClass('@error("paypal") is-invalid @enderror');
         }
         if(mid == 1)
         {
            $('label#payment').empty();

            $('label#payment').prepend("Please enter you payoneer account id");

            $('#paywith').attr('name', 'payoneer');

            $('#paywith').addClass('@error("payoneer") is-invalid @enderror');


         }
         if(mid == 2)
         {
            $('label#payment').empty();

            $('label#payment').prepend("Enter IBAN , other detail put in Optional");

            $('#paywith').attr('name', 'iban');

            $('#paywith').addClass('@error("iban") is-invalid @enderror');


         }
      });
   });
   	
         // $('label#payment').remove();
         // let mid=$(this).val(),
         // console.log(mid);
                     
         // if(mid == 0)
         // {
         //  	$('label#payment').prepend("Pay with paypal")
         // }
         // elseif()
         // {

         // }
         // else
         // {

         // }
</script>
   		

@endsection