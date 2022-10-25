@extends('admin.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Subscription Plan </h1>
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
            <li class="breadcrumb-item text-muted">  Plan </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> Subscription Plan View  </li>
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
<div id="kt_content_container" class="container-xl" style="margin-top: 11pc;margin-left:7pc">
   <!--begin::Navbar-->
   <div class="card pt-4 mb-6 mb-xl-9">
      <!--begin::Card header-->
      <div class="card-header border-0">
         <!--begin::Card title-->
         <div class="card-title">
            <h2 class="fw-bolder mb-0"> Subscription Plan View  </h2>
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
                              <td class="text-muted min-w-125px w-125px">Title </td>
                              <td class="text-gray-800">{{$plan->title}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Cost</td>
                              <td class="text-gray-800">{{$plan->cost}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Product Allowed	 </td>
                              <td class="text-gray-800"> {{$plan->limit}}</td>
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
                              <td class="text-muted min-w-125px w-125px">Currency Symbol	</td>
                              <td class="text-gray-800">{{$plan->symbol}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Duration </td>
                              <td class="text-gray-800">{{$plan->days}} days</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Product  Description</td>
                              <td class="text-gray-800"> {{$plan->detail}}</td>
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
@endsection