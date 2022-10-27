@extends('admin.layouts.app')
@section('content')
<div id="kt_content_container" class="container-xl" style="margin-top:6pc;margin-left:7pc">
   <!--begin::Navbar-->
   <div class="card pt-4 mb-6 mb-xl-9">
      <!--begin::Card header-->
      <div class="card-header border-0">
         <!--begin::Card title-->
         <div class="card-title">
            <h2 class="fw-bolder mb-0">View  Staff </h2>
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
                              <td class="text-muted min-w-125px w-125px"> Image</td>
                              <td class="text-gray-800"><img src="{{ asset('storage/uploads/admins/'.$staff->image)}}" width="50px"></td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px"> Name </td>
                              <td class="text-gray-800">{{$staff->name}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Email </td>
                              <td class="text-gray-800">{{$staff->email}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Phone</td>
                              <td class="text-gray-800">{{$staff->cell}}</td>
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
                              <td class="text-muted min-w-125px w-125px">Manage Roles</td>
                              <td class="text-gray-800">{{$role[$staff->role]}}</td>
                           </tr>
                           <tr>
                              <td class="text-muted min-w-125px w-125px">Password </td>
                              <td class="text-gray-800">************* *****</td>
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