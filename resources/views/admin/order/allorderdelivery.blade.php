@extends('admin.layouts.app')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:5pc" id="kt_content">
   <div class="toolbar py-2" id="kt_toolbar">
      <!--begin::Container-->
      <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
         <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> All Orders</h1>
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
               <li class="breadcrumb-item text-muted">Delivery</li>
               <!--end::Item-->
               <!--begin::Item-->
               <li class="breadcrumb-item">
                  <span class="bullet bg-gray-200 w-5px h-2px"></span>
               </li>
               <!--end::Item-->
               <!--begin::Item-->
               <li class="breadcrumb-item text-dark"> Order Delivery list</li>
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
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl" style="margin-top:3pc;" >
      <!--begin::Basic info-->
      <div class="card mb-5 mb-xl-10">
         <!--begin::Card header-->
         <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
               <h3 class="fw-bolder m-0">Delivery Status</h3>
            </div>
            <!--end::Card title-->
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form class="form" action="{{ route('admin.order_allorderstatus', $sub_order->id) }}" method="post">
				@method('PUT')
				@csrf
               <!--begin::Card body-->
               <div class="card-body border-top p-9">
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Payment Status</span>
                        <!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
					 	<span class="badge 
						@if($sub_order->order->pay_status == 'success') badge-success @else badge-danger @endif	">{{$sub_order->order->pay_status}}</span>
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Delivery Status</span>
                        <!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <select name="sub_status" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Delivery Status..." class="form-select form-select-solid form-select-lg fw-bold">
                           <option  value="0" @if($order_status == 0) selected @endif>{{$order_status[0]}}</option>
                           <option  value="1" @if($order_status == 1) selected @endif>{{$order_status[1]}}</option>
                           <option  value="2" @if($order_status == 2) selected @endif>{{$order_status[2]}}</option>
                           <option  value="3" @if($order_status == 3) selected @endif>{{$order_status[3]}}</option>
                           <option  value="4" @if($order_status == 4) selected @endif>{{$order_status[4]}}</option>
                        </select>
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Track Note</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <textarea name="tracking" id="editor">
                        </textarea>
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
@endsection