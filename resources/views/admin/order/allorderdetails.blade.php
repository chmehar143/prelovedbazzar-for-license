@extends('admin.layouts.app')
@section('content')
<style>
      .special-box {
      box-shadow: 0px 1px 6px 0px rgb(208 208 208 / 61%);
      }
      .special-box {
      margin-bottom: 20px;
      }
      .special-box .heading-area {
      background: #eaeaf1;
      border-bottom: 0px;
      padding: 10px 30px 10px;
      }
      .heading-area {
      background: #fff;
      padding: 30px 30px 30px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.15);
      padding-bottom: 20px;
      margin-bottom: 25px;
      }
      .special-box .table-responsive-sm {
      padding: 0px 30px 10px 30px;
      }
      .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
      }
      .h4, h4 {
      font-size: 22px !important;
      }
      .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
      margin-top: 0 !important;
      margin-bottom: -0.5rem !important;
      font-weight: 600 !important;
      line-height: 3.2 !important;
      color: #181c32 !important;
      }
      .special-box .footer-area .mybtn1 {
      display: inline-block;
      text-transform: unset;
      border-radius: 50px;
      background: #2d3274;
      box-shadow: none;
      }
      .mybtn1 {
      border-radius: 50px;
      background-color: #1f224f;
      -webkit-box-shadow: 0px 5px 10px 0px rgb(14 35 107 / 30%);
      box-shadow: 0px 5px 10px 0px rgb(14 35 107 / 30%);
      text-align: center;
      color: #fff;
      font-size: 16px;
      font-weight: 400;
      display: inline-block;
      -webkit-transition: all 0.3s ease-in;
      -o-transition: all 0.3s ease-in;
      transition: all 0.3s ease-in;
      position: relative;
      padding: 7px 25px;
      border: 0px;
      }
      .order-details-table .mr-table {
      box-shadow: 0px 1px 6px 0px rgb(208 208 208 / 61%);
      padding-bottom: 5px;
      }
      .order-table-wrap .mr-table {
      padding: 0px;
      margin-top: 20px;
      text-align: center;
      }
      .order-table-wrap .mr-table .title {
      background: #eaeaf1;
      display: block;
      width: 100%;
      padding: 10px 25px 10px;
      text-align: left;
      margin-bottom: 0px;
      }
      .order-table-wrap .mr-table .title {
      font-weight: 600;
      font-size: 19px;
      display: inline-block;
      }
   </style>
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
            <li class="breadcrumb-item text-muted">Details</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> Order Details</li>
            <!--end::Item-->
         </ul>
         <!--end::Breadcrumb-->
      </div>
   </div>
   <!--end::Container-->
</div>
<div style="background-color:white">
   <div class="container" style="margin-top:11pc;margin-left: 1pc" >
      <div class="mr-breadcrumb">
         <div class="row">
            <div class="col-lg-12">
            </div>
         </div>
      </div>
      <div class="order-table-wrap">
         <div class="alert alert-success validation" style="display: none;">
            <button type="button" class="close alert-close"><span>×</span></button>
            <p class="text-left"></p>
         </div>
         <div class="alert alert-danger validation" style="display: none;">
            <button type="button" class="close alert-close"><span>×</span></button>
            <ul class="text-left">
            </ul>
         </div>
         <div class="row">
            <div class="col-lg-6">
               <div class="special-box">
                  <div class="heading-area">
                     <h4 class="title">
                        Order Details
                     </h4>
                  </div>
                  <div class="table-responsive-sm">
                     <table class="table">
                        <tbody>
                           <tr>
                              <th class="45%" width="45%">Order ID</th>
                              <td width="10%">:</td>
                              <td class="45%" width="45%">{{$order->id}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Total Product</th>
                              <td width="10%">:</td>
                              <td width="45%">{{$order->order_detail->sum('pro_qnty')}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Shipping Fee</th>
                              <td width="10%">:</td>
                              <td width="45%">{{$order->sub_shipping}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Sub total</th>
                              <td width="10%">:</td>
                              <td width="45%">{{$order->subtotal}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Total Cost</th>
                              <td width="10%">:</td>
                              <td width="45%">{{$order->sub_shipping + $order->subtotal }}</td>
                           </tr>
                           <tr>
                              <th width="45%">Ordered Date</th>
                              <td width="10%">:</td>
                              <td width="45%">{{$order->created_at}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Payment Status</th>
                              <th width="10%">:</th>
                              <td width="45%"><span class="badge badge-danger">{{$order->pay_status}}</span></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="footer-area">
                     <a href="{{ route('vendor.order_invoice', $order->id) }}" class="mybtn1"><i class="fas fa-eye"></i> View Invoice</a>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="special-box">
                  <div class="heading-area">
                     <h4 class="title">
                        Billing Details
                     </h4>
                  </div>
                  <div class="table-responsive-sm">
                     <table class="table">
                        <tbody>
                           <tr>
                              <th width="45%">Name</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->fname}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Email</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->email}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Phone</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->phone}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Address</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->street." ".$order->apart}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Country</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->country}}</td>
                           </tr>
                           <tr>
                              <th width="45%">State</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->state}}</td>
                           </tr>
                           <tr>
                              <th width="45%">City</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->city}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Postal Code</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->zip}}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="special-box">
                  <div class="heading-area">
                     <h4 class="title">
                        Shipping Details
                     </h4>
                  </div>
                  <div class="table-responsive-sm">
                     <table class="table">
                        <tbody>
                        <tr>
                              <th width="45%">Name</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_fname}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Email</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->email}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Phone</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_phone}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Address</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_street." ".$order->s_apart}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Country</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_country}}</td>
                           </tr>
                           <tr>
                              <th width="45%">State</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_state}}</td>
                           </tr>
                           <tr>
                              <th width="45%">City</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_city}}</td>
                           </tr>
                           <tr>
                              <th width="45%">Postal Code</th>
                              <th width="10%">:</th>
                              <td width="45%">{{$order->s_zip}}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12 order-details-table">
               <div class="mr-table">
                  <h4 class="title">Product Ordered</h4>
                  <div class="table-responsiv">
                     <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row btn-area">
                           <div class="col-sm-4"></div>
                           <div class="col-sm-4"></div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="example2" class="table table-hover dt-responsive dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid">
                                 <thead>
                                    <tr role="row">
                                    </tr>
                                    <tr role="row">
                                       <th width="10%" class="sorting_disabled" rowspan="1" colspan="1">Product ID#</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Handled By</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Order Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Quantity</th>
                                       <th width="20%" class="sorting_disabled" rowspan="1" colspan="1">Details</th>
                                       <th width="10%" class="sorting_disabled" rowspan="1" colspan="1">Total Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($order->order_detail as $detail)
                                    <tr role="row" class="odd">
                                       <td>
                                          <a href="{{route('admin.allproducts_view', $detail->product->id)}}">{{$detail->product->id}}</a>
                                       </td>
                                       <td>
                                          @if($detail->product->vendor_id == NULL) 
                                          <a href="{{ route('admin.order_allorderdelivery', $detail->id)}}">{{__('Admin')}}</a> 
                                          @else {{$detail->product->vendor->name}} ({{__('Seller')}}) @endif
                                       </td>
                                       <td>
                                          {{$status[$detail->sub_status]}}
                                       </td>
                                       <td>
                                          {{$detail->pro_qnty}}
                                       </td>
                                       <td>
                                          <p>
                                             <strong>Size :</strong> {{$detail->size}}
                                          </p>
                                          <p>
                                             <strong>color :</strong><span style="width: 40px; height: 20px; display: block; float: right; background: {{$detail->color}};"></span>
                                          </p>
                                       </td>
                                       <td>{{$detail->subtotal}}</td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 col-md-5"></div>
                           <div class="col-sm-12 col-md-7">
                              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                 <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection