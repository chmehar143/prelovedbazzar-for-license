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
         <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
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
            <li class="breadcrumb-item text-dark"> Edit Withdraw  </li>
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
      <!--begin::Action group-->
      <div class="d-flex align-items-center flex-wrap">
         <!--begin::Wrapper-->
         <div class="flex-shrink-0 me-2">
            <ul class="nav">
               <li class="nav-item">
                  <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light active fw-bold fs-7 px-4 me-1" data-bs-toggle="tab" href="#">Day</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 me-1" data-bs-toggle="tab" href="">Week</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4" data-bs-toggle="tab" href="#">Year</a>
               </li>
            </ul>
         </div>
         <!--end::Wrapper-->
         <!--begin::Wrapper-->
         <div class="d-flex align-items-center">
            <!--begin::Daterangepicker-->
            <a href="#" class="btn btn-sm btn-bg-light btn-color-gray-500 btn-active-color-primary me-2" id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover" title="" data-bs-original-title="Select dashboard daterange">
            <span class="fw-bold me-1" id="kt_dashboard_daterangepicker_title">Today:</span>
            <span class="fw-bolder" id="kt_dashboard_daterangepicker_date">Sep 7</span>
            </a>
            <!--end::Daterangepicker-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center">
               <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light btn-active-color-primary">
                  <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                  <span class="svg-icon svg-icon-2x">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13H13V10C13 9.4 12.6 9 12 9C11.4 9 11 9.4 11 10V13H8C7.4 13 7 13.4 7 14C7 14.6 7.4 15 8 15H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V15H16C16.6 15 17 14.6 17 14C17 13.4 16.6 13 16 13Z" fill="black"></path>
                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"></path>
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
               </button>
            </div>
            <!--end::Actions-->
         </div>
         <!--end::Wrapper-->
      </div>
      <!--end::Action group-->
   </div>
   <!--end::Container-->
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top:8pc">
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
               <h3 class="fw-bolder m-0">Edit Withdraw Details</h3>
            </div>
            <!--end::Card title-->
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form">
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
                        <select name="country" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Withdraw Method 
                           ..." class="form-select form-select-solid form-select-lg fw-bold">
                           <option value="">Withdraw Method...</option>
                           <option data-kt-flag="flags/afghanistan.svg" value="AF">paypal</option>
                           <option data-kt-flag="flags/venezuela.svg" value="VE">payoneer</option>
                        </select>
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
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
                              <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder=" 1002" value="2002" />
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
                        <textarea name="content" id="editor">
                        </textarea>
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-0">
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Status </label>
                     <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch fv-row">
                           <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                           <label class="form-check-label" for="allowmarketing"></label>
                        </div>
                     </div>
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
<!--end::Scr
@endsection