@extends('vendor.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc">   Subscription Plan </h1>
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
            <li class="breadcrumb-item text-muted">   Plan </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">  Subscription Plan list </li>
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


<div id="kt_content_container" class="container-xl" style="margin-top:11pc;margin-left:7pc">
   <!--begin::Navbar-->
      @if(session('message'))
         <div class="alert alert-success card pt-4 mb-6 mb-xl-9">{{ session('message') }}</div>
      @endif

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
                              <td class="text-muted min-w-150px w-125px">Your Name</td>
                              <td class="text-gray-800">{{$myplan->vendor->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-150px w-125px">Card Holder Name</td>
                              <td class="text-gray-800">{{$plan_customer->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-150px w-125px">Card No</td>
                              <td class="text-gray-800">***{{$plan_charge->payment_method_details->card->last4}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-150px w-125px">Paid Amount</td>
                              <td class="text-gray-800">{{$myplan->paid_amount}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-150px w-125px">Payment Status</td>
                              <td class="text-gray-800">{{$myplan->payment_status}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-150px w-125px">Paymen receipt url</td>
                              <td class="text-gray-800"><a href="{{$myplan->receipt_url}}">click here</a></td>
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
                              <td class="text-muted min-w-125px w-200px"> Subscription valid days </td>
                              <td class="text-gray-800">{{$myplan->subscription_plan->days}}</td>
                           </tr>

                           <tr>
                              <td class="text-muted min-w-125px w-200px"> Plan remaining days </td>
                              <td class="text-gray-800">{{$myplan->remainig_days}}</td>
                           </tr>

                           
                           <tr>
                              <td class="text-muted min-w-125px w-200px">Allowed products quantity </td>
                              <td class="text-gray-800">@if($myplan->allowed_quantity == 0) unlimited @else {{$myplan->allowed_quantity}} @endif</td>
                           </tr>
                           
                           <tr>
                              <td class="text-muted min-w-125px w-200px">Remaining quantity </td>
                              <td class="text-gray-800">@if($myplan->allowed_quantity == 0) unlimited @else {{$myplan->remaining_quantity}} @endif</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Status </td>
                              <td class="text-gray-800">
                                 {{$status[$myplan->status]}}
                                 <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                 <span class="svg-icon svg-icon-2  @if($myplan->status == 0) svg-icon-success @else  svg-icon-danger @endif">
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
@endsection