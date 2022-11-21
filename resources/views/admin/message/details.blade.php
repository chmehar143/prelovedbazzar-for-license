@extends('admin.layouts.app')
@section('content')
<head>
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
</head>
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc">  Message Details   </h1>
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
            <li class="breadcrumb-item text-muted"> Message </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Message Details List </li>
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
</div>
<div style="background-color:white">
   <div class="container" style="margin-top:11pc;margin-left:1pc" >
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
                              <td class="45%" width="45%">lwNz1587745415</td>
                           </tr>
                           <tr>
                              <th width="45%">Total Product</th>
                              <td width="10%">:</td>
                              <td width="45%">1</td>
                           </tr>
                           <tr>
                              <th width="45%">Shipping Method</th>
                              <td width="10%">:</td>
                              <td width="45%">Free Shipping</td>
                           </tr>
                           <tr>
                              <th width="45%">Packaging Method</th>
                              <td width="10%">:</td>
                              <td width="45%">Default Packaging</td>
                           </tr>
                           <tr>
                              <th width="45%">Total Cost</th>
                              <td width="10%">:</td>
                              <td width="45%">₹8963.5</td>
                           </tr>
                           <tr>
                              <th width="45%">Ordered Date</th>
                              <td width="10%">:</td>
                              <td width="45%">24-Apr-2020 14:23:35 pm</td>
                           </tr>
                           <tr>
                              <th width="45%">Payment Method</th>
                              <td width="10%">:</td>
                              <td width="45%">Paytm</td>
                           </tr>
                           <tr>
                              <th width="45%">Paytm Transaction ID</th>
                              <td width="10%">:</td>
                              <td width="45%"></td>
                           </tr>
                           <tr>
                              <th width="45%">Payment Status</th>
                              <th width="10%">:</th>
                              <td width="45%"><span class="badge badge-danger">Unpaid</span></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="footer-area">
                     <a href="{{url('admin/message_invoice')}}" class="mybtn1"><i class="fas fa-eye"></i> View Invoice</a>
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
                              <td width="45%">Vendor</td>
                           </tr>
                           <tr>
                              <th width="45%">Email</th>
                              <th width="10%">:</th>
                              <td width="45%">vendor@gmail.com</td>
                           </tr>
                           <tr>
                              <th width="45%">Phone</th>
                              <th width="10%">:</th>
                              <td width="45%">3453453345453411</td>
                           </tr>
                           <tr>
                              <th width="45%">Address</th>
                              <th width="10%">:</th>
                              <td width="45%">Space Needle 400 Broad St, Seattles</td>
                           </tr>
                           <tr>
                              <th width="45%">Country</th>
                              <th width="10%">:</th>
                              <td width="45%">Algeria</td>
                           </tr>
                           <tr>
                              <th width="45%">State</th>
                              <th width="10%">:</th>
                              <td width="45%">UN</td>
                           </tr>
                           <tr>
                              <th width="45%">City</th>
                              <th width="10%">:</th>
                              <td width="45%">Test City</td>
                           </tr>
                           <tr>
                              <th width="45%">Postal Code</th>
                              <th width="10%">:</th>
                              <td width="45%">1234</td>
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
                              <th width="45%"><strong>Name:</strong></th>
                              <th width="10%">:</th>
                              <td>Vendor</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>Email:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">vendor@gmail.com</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>Phone:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">3453453345453411</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>Address:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">Space Needle 400 Broad St, Seattles</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>Country:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">Algeria</td>
                           </tr>
                           <tr>
                              <th width="45%">State</th>
                              <th width="10%">:</th>
                              <td width="45%">UN</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>City:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">Test City</td>
                           </tr>
                           <tr>
                              <th width="45%"><strong>Postal Code:</strong></th>
                              <th width="10%">:</th>
                              <td width="45%">1234</td>
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
                  <h4 class="title">Products Ordered</h4>
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
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Shop Name</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Vendor Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1">Product Title</th>
                                       <th width="20%" class="sorting_disabled" rowspan="1" colspan="1">Details</th>
                                       <th width="10%" class="sorting_disabled" rowspan="1" colspan="1">Total Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr role="row" class="odd">
                                       <td tabindex="0"><input type="hidden" value="101S000000">101</td>
                                       <td>
                                          <a target="_blank" href="https://royalscripts.com/demo/kingcommerce/admin/vendors/13/show">Test Stores</a>
                                       </td>
                                       <td>
                                          <span class="badge badge-warning">Pending</span>
                                       </td>
                                       <td>
                                          <input type="hidden" value="">
                                          <a target="_blank" href="https://royalscripts.com/demo/kingcommerce/item/physical-product-title-title-will-be-here-101-8e1101lbq">Physical Product Title Title w...</a>
                                       </td>
                                       <td>
                                          <p>
                                             <strong>Size :</strong> S
                                          </p>
                                          <p>
                                             <strong>color :</strong> <span style="width: 40px; height: 20px; display: block; background: #000000;"></span>
                                          </p>
                                          <p>
                                             <strong>Price :</strong> ₹8963.5
                                          </p>
                                          <p>
                                             <strong>Qty :</strong> 1 
                                          </p>
                                       </td>
                                       <td>₹8963.5</td>
                                    </tr>
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