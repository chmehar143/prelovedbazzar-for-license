@extends('admin.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Product Review  </h1>
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
            <li class="breadcrumb-item text-muted"> Product </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Product Review List  </li>
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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xxl" style="    margin-top: 11pc;">
      <div class="card container">
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
                  <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Review">
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
         <div class="card-body pt-0" style="overflow:scroll;">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
               <!--begin::Table head-->
               <thead>
                  <!--begin::Table row-->
                  <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                     <th class="w-10px pe-2">
                        <div
                           class="form-check form-check-sm form-check-custom form-check-solid me-3">
                           <input class="form-check-input" type="checkbox" data-kt-check="true"
                              data-kt-check-target="#kt_customers_table .form-check-input"
                              value="1" />
                        </div>
                     </th>
                     <th class="min-w-125px"> Product </th>
                     <th class="min-w-125px">Reviewer	</th>
                     <th class="min-w-125px"> Rating </th>
                     <th class="min-w-125px">Price </th>
                     <th class="min-w-125px">Actions </th>
                     <th class="min-w-125px" style="display:none">Status </th>
                     <td style="display:none">121541500515	</td>
                     <td style="display:none">121541500515	</td>
                  </tr>
                  <!--end::Table row-->
               </thead>
               <!--end::Table head-->
               <!--begin::Table body-->
               <tbody class="fw-bold text-gray-600">
				  @foreach($reviews as $review)
                  <tr id="nft_row_{{$review->id}}">
                     <!--begin::Checkbox-->
                     <td>
                        <div
                           class="form-check form-check-sm form-check-custom form-check-solid">
                           <input class="form-check-input" type="checkbox" value="1" />
                        </div>
                     </td>
                     <!--end::Checkbox-->
                     <td>{{$review->p_name}}</td>
                     <td>{{$review->user_name}}</td>
                     <td class="text-end pe-0" data-order="rating-5" data-filter="rating-5">
                        <div class="rating ">
                           <div class="rating-label @if($review->review > 0) checked @endif">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                              <span class="svg-icon svg-icon-2">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <div class="rating-label @if($review->review > 1) checked @endif">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                              <span class="svg-icon svg-icon-2">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <div class="rating-label @if($review->review > 2) checked @endif">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                              <span class="svg-icon svg-icon-2">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <div class="rating-label @if($review->review > 3) checked @endif">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                              <span class="svg-icon svg-icon-2">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <div class="rating-label @if($review->review > 4) checked @endif">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen029.svg-->
                              <span class="svg-icon svg-icon-2">
                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1359 4.48359C11.5216 3.82132 12.4784 3.82132 12.8641 4.48359L15.011 8.16962C15.1523 8.41222 15.3891 8.58425 15.6635 8.64367L19.8326 9.54646C20.5816 9.70867 20.8773 10.6186 20.3666 11.1901L17.5244 14.371C17.3374 14.5803 17.2469 14.8587 17.2752 15.138L17.7049 19.382C17.7821 20.1445 17.0081 20.7069 16.3067 20.3978L12.4032 18.6777C12.1463 18.5645 11.8537 18.5645 11.5968 18.6777L7.69326 20.3978C6.99192 20.7069 6.21789 20.1445 6.2951 19.382L6.7248 15.138C6.75308 14.8587 6.66264 14.5803 6.47558 14.371L3.63339 11.1901C3.12273 10.6186 3.41838 9.70867 4.16744 9.54646L8.3365 8.64367C8.61089 8.58425 8.84767 8.41222 8.98897 8.16962L11.1359 4.48359Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                        </div>
                     </td>
                     <td>${{$review->p_new_price}}</td>
                     <td style="display:none">121541500515	</td>
                     <td style="display:none">121541500515	</td>
                     <!--end::Date=-->
                     <!--begin::Action=-->
                     <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                           data-kt-menu-trigger="click"
                           data-kt-menu-placement="bottom-end">
                           Actions
                           <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                           <span class="svg-icon svg-icon-5 m-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                 <path
                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                    fill="black" />
                              </svg>
                           </span>
                           <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                           data-kt-menu="true">
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="{{route('admin.productdisscussion_reviewview')}}/{{$review->id}}"
                                 class="menu-link px-3">View</a>
                           </div>
                           <!--end::Menu item-->
                           <!--begin::Menu item-->
                           <div class="menu-item px-3">
                              <a href="javascript:void(0)" class="menu-link px-3"
                                 data-kt-customer-table-filter="delete_row" onclick="deleteComment({{$review->id}})">Delete</a>
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
function deleteComment(id) {
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
			$.ajax({
				url: "{{url('admin/productdisscussion_delete')}}"+ '/' + id,
				success: function(data) {
					$("#nft_row_" +id).remove();
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