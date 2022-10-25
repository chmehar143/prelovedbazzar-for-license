@extends('admin.layouts.app')
@section('content')
<head>
   <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:5pc" id="kt_content">
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
            <!--begin::Card title-->
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Track Order </h3>
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
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Title </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid"  placeholder="title" />
                     </div>
                     <!--end::Col-->
                  </div>
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6"> Details </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <textarea name="content" id="editor">
                        &lt;p&gt;Details.&lt;/p&gt;
                        </textarea>
                     </div>
                     <!--end::Col-->
                  </div>
               </div>
               <!--end::Card body-->
               <!--begin::Actions-->
               <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                  <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ADD </button>
               </div>
               <!--end::Actions-->
            </form>
            <!--end::Form-->
         </div>
         <!--end::Content-->
      </div>
      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
         <!--begin::Container-->
         <div id="kt_content_container" class="container-xl">
            <!--begin::Card-->
            <h2>TRACKING DETAILS</h2>
            <div class="card">
               <!--begin::Card header-->
               <div class="card-header border-0 pt-6">
                  <!--begin::Card title-->
                  <div class="card-title">
                     <!--begin::Search-->
                     <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                              <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                           </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search  Products">
                     </div>
                     <!--end::Search-->
                  </div>
                  <!--begin::Card title-->
                  <!--begin::Card toolbar-->
                  <div class="card-toolbar">
                     <!--begin::Toolbar-->
                     <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <!--begin::Menu 1-->
                        <!--begin::Add customer-->
                        <!-- data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" -->
                        <!--end::Add customer-->
                     </div>
                     <!--end::Toolbar-->
                     <!--begin::Group actions-->
                     <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                           <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                     </div>
                     <!--end::Group actions-->
                  </div>
                  <!--end::Card toolbar-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-0"  >
                  <!--begin::Table-->
                  <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                     <!--begin::Table head-->
                     <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                           <th class="w-10px pe-2">
                              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                 <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                              </div>
                           </th>
                           <th class="min-w-125px"> Title </th>
                           <th class="min-w-125px">Details </th>
                           <th class="min-w-125px"> Date </th>
                           <th class="min-w-125px"> Time </th>
                           <th class="min-w-125px" style="display:none">Status </th>
                        </tr>
                        <!--end::Table row-->
                     </thead>
                     <!--end::Table head-->
                     <!--begin::Table body-->
                     <tbody class="fw-bold text-gray-600">
                        <tr>
                           <td>
                              <div class="form-check form-check-sm form-check-custom form-check-solid">
                                 <input class="form-check-input" type="checkbox" value="1">
                              </div>
                           </td>
                           <td>avc</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis,</td>
                           <td>2022-08-29	</td>
                           <td>11:57:37:pm		</td>
                           <td><a type="button" class="btn btn-primary" href="#"> Edit</a></td>
                        </tr>
                     </tbody>
                     <!--end::Table body-->
                  </table>
                  <!--end::Table-->
               </div>
            </div>
            <!--end::Card body-->
         </div>
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
@endsection