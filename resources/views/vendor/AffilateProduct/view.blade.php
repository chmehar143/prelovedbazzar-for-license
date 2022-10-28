@extends('vendor.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Affilate Products </h1>
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
            <li class="breadcrumb-item text-muted"> Products </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> View Affilate Products </li>
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
<div id="kt_content_container" class="container-xl" style="margin-top:9pc;margin-left:7pc">
   <!--begin::Navbar-->
   <div class="card pt-4 mb-6 mb-xl-9">
      <!--begin::Card header-->
      <div class="card-header border-0">
         <!--begin::Card title-->
         <div class="card-title">
            <h2 class="fw-bolder mb-0">View Affilated Product</h2>
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
                              <td class="text-muted min-w-125px w-125px">Current Featured Image</td>
                              <td class="text-gray-800"><img src="{{ asset('storage/uploads/products/'.$product->a_image)}}" width="100px"></td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Product Name </td>
                              <td class="text-gray-800">{{$product->a_name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Quantity</td>
                              <td class="text-gray-800">{{$product->a_stock}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Price</td>
                              <td class="text-gray-800">{{$product->a_old_price}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Issuer</td>
                              <td class="text-gray-800">{{$product->a_sku}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Shipping Time</td>
                              <td class="text-gray-800">{{$product->a_shia_time}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Current Price</td>
                              <td class="text-gray-800">{{$product->a_new_price}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Product Return Policy </td>
                              <?php $policy = strip_tags($product->a_r_policy); ?>
                              <td class="text-gray-800">{{$policy}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Size </td>
                              <td class="text-gray-800">
                                @if($product->small == 1) small, @endif
                                @if($product->medium == 1) medium, @endif
                                @if($product->large == 1) large @endif
                              </td>
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
                              <td class="text-muted min-w-125px w-125px">Prdouct Color</td>
                              <td class="text-gray-800">
                                 <input type="color" value="{{$product->a_color}}" disabled>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Category </td>
                              <td class="text-gray-800">{{$category->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Sub Category </td>
                              <td class="text-gray-800">{{$subcategory->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Child Category </td>
                              <td class="text-gray-800">{{$childcategory->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Previous Price</td>
                              <td class="text-gray-800">{{$product->a_old_price}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Product Stock</td>
                              <td class="text-gray-800">{{$product->a_stock}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Product  Description</td>
                              <?php $detail = strip_tags($product->a_detail); ?>
                              <td class="text-gray-800">{{$detail}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Status </td>
                              <td class="text-gray-800">
                                 {{$product->a_status}}
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
@endsection