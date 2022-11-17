@extends('admin.layouts.app')
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
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:11pc" id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl" >
      <!--begin::Navbar-->
      <div class="card mb-5 mb-xl-10">
      </div>
      <!--end::Navbar-->
      <!--begin::Basic info-->
      <div class="card mb-5 mb-xl-10">
         <!--begin::Card header-->
         <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" action="{{ route('admin.subscriptionplan_update', $plan->id)}}" class="form" method="post" >
               @csrf
               @method('PUT')
               <!--begin::Card body-->
               <div class="card-body border-top p-9">
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Title </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" name="title" class="@error('title') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$plan->title}}"  />
                              @error('title')
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
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Currency Symbol </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="symbol" class="@error('symbol') is-invalid @enderror form-control form-control-lg form-control-solid" value="{{$plan->symbol}}" />
                        @error('symbol')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Currency Code </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="code" class="@error('code') is-invalid @enderror form-control form-control-lg form-control-solid" value="{{$plan->code}}"  />
                        @error('code')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Cost </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="cost" class="@error('cost') is-invalid @enderror form-control form-control-lg form-control-solid" value="{{$plan->cost}}"  />
                        @error('cost')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Days </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="days" class="@error('days') is-invalid @enderror form-control form-control-lg form-control-solid" value="{{$plan->days}}" />
                        @error('days')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Product Limitaion</span>
                        <!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <select name="limit" aria-label="Select a Product Condition" data-control="select2" data-placeholder="Select a Product Condition..." class="form-select form-select-solid form-select-lg fw-bold">
                           <option value="">Product Condition...</option>
                           <option data-kt-flag="flags/afghanistan.svg" value="0" @if($plan->limit == 0) selected @endif>Unlimited</option>
                           <option data-kt-flag="flags/venezuela.svg" value="1" @if($plan->limit == 1) selected @endif>Limited</option>
                        </select>
                        @error('limit')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Allowed product quantity</span>
                        <!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="allowed_quantity" value="@if($plan->allowed_quantity == 0) Unlimited @else {{$plan->allowed_quantity}} @endif" class="@error('allowed_quantity') is-invalid @enderror form-control form-control-lg form-control-solid" placeholder="Unlimited" />
                        @error('allowed_quantity')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Allowed product type</span>
                        <!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <select name="allowed_type" aria-label="Select Product Type..." data-control="select2" data-placeholder="Select Product Type..." class="form-select form-select-solid form-select-lg" >
                           <option value="">Product Type</option>
                           <option  value="0" @if($plan->allowed_type == 0) selected @endif >Physical</option>
                           <option  value="1" @if($plan->allowed_type == 1) selected @endif >Digital</option>
                           <option  value="2" @if($plan->allowed_type == 2) selected @endif >License</option>
                        </select>
                        @error('allowed_type')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6"> Details</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <textarea name="detail" id="editor">
							      {{$plan->detail}}
                        </textarea>
                        @error('detail')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
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
@endsection