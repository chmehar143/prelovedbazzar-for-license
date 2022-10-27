@extends('admin.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3 py-2" style="margin-left:3pc"> Website Banner </h1>
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
            <li class="breadcrumb-item text-muted">  Banner </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> Website Banner List</li>
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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl" style="    margin-top: 11pc;">
      <!--begin::Card-->
      <div class="card container" >
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
                  <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Comment">
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
                  <a type="button" class="btn btn-primary" href="{{route('admin.webbanner_create')}}">Add Web Banner</a>
                  <!-- data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" -->
                  <!--end::Add customer-->
               </div>
               <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body pt-0" style="overflow:scroll;">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
               <!--begin::Table head-->
               <thead>
                  <!--begin::Table row-->
                  <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                     <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                           #
                        </div>
                     </th>
                     <th class="min-w-125px"> Image </th>
                     <th class="min-w-125px"> Title </th>
                     <th class="min-w-125px"> Offer </th>
                     <th class="min-w-125px"> Url </th>
                     <td class="min-w-125px"> Status </td>
                     <td style="display:none"></td>
                  </tr>
                  <!--end::Table row-->
               </thead>
               <!--end::Table head-->
               <!--begin::Table body-->
               <tbody class="fw-bold text-gray-600">
                  @foreach($banners as $banner)
                  <tr id="ban_row_{{$banner->id}}">
                     <!--begin::Checkbox-->
                     <td>
                        <div>
                           {{$loop->iteration}}
                        </div>
                     </td>
                     <!--end::Checkbox-->
                     <td><img src="{{ asset('storage/uploads/Web_banners/'. $banner->image)}}" width="50px"></td>
                     <td>{{$banner->title}}</td>
                     <td>{{$banner->offer}}</td>
                     <td>{{$banner->url}}</td>
                     <td data-order="Invalid date">
                        <span class="badge @if($banner->status==1) badge-light-success @else badge-light-danger @endif">
                           {{ $status[$banner->status] }}</span>
                     </td>
                     <!--end::Date=-->
                     <!--begin::Action=-->
                     <td class="text-end" >
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                           Actions
                           <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                           <span class="svg-icon svg-icon-5 m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                              </svg>
                           </span>
                           <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                           <!--begin::Menu item-->
                           <!--end::Menu item-->
                           <div class="menu-item px-3">
                              <a href="{{ route('admin.webbanner_edit', $banner->id )}}" class="menu-link px-3">Edit</a>
                           </div>
                           <!--begin::Menu item-->
                           <div class="menu-item px-3" >
                              <a href="javascript:void(0)" class="menu-link px-3" data-kt-customer-table-filter="delete_row" onclick="remove({{$banner->id}})" >Delete</a>
                           </div>
                           <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                     </td>
                     <!--end::Action=-->
                  </tr>
				      @endforeach
               </tbody>
               <!--end::Table body-->
            </table>
            <!--end::Table-->
         </div>
      </div>
      <!--end::Card body-->
   </div>
</div>
<!--end::Container-->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
   function remove(id) {
   	Swal.fire({
   		title: 'Are you sure?',
   		text: "You won't be able to revert this!",
   		icon: 'warning',
   		showCancelButton: true,
   		confirmButtonColor: '#3085d6',
   		cancelButtonColor: '#d33',
   		confirmButtonText: 'Yes, delete it!'
   	}).then((result) => {
   		if (result.isConfirmed) {
               var url = "{{ route('admin.webbanner_remove', ':id') }}";
               url = url.replace(':id', id);
   			$.ajax({
   				url: url,
   				success: function(data) {
   					$("#ban_row_" +id).remove();
   					Swal.fire(
   						'Deleted!',
   						'Product has been deleted.',
   						'success'
   					)
   				}
   			});
   		}
   	})
   }
</script>
@endsection