@extends('admin.layouts.app')

@section('content')
<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center"><div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Manage Roles</h1>
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
										<li class="breadcrumb-item text-muted"> Roles </li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark"> Manage Roles</li>
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
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Roles">
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
											<a type="button" class="btn btn-primary" href="{{url('admin/manageroles_create')}}">Add Roles</a>
											<!-- data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" -->
											<!--end::Add customer-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
											<div class="fw-bolder me-5">
											<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
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
												<div
													class="form-check form-check-sm form-check-custom form-check-solid me-3">
													<input class="form-check-input" type="checkbox" data-kt-check="true"
														data-kt-check-target="#kt_customers_table .form-check-input"
														value="1" />
												</div>
											</th>
											<th class="min-w-125px" style="display:none"> Image </th>
											<th class="min-w-125px"> Name </th>

											<th class="min-w-125px" style="display:none">Email </th>
											<th class="min-w-125px"> Permissions </th>

											<th class="min-w-125px" style="display:none"> Role </th>

											<th class="min-w-125px" style="display:none">Status </th>

										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="fw-bold text-gray-600">

										<tr>
											<!--begin::Checkbox-->
											<td>
												<div
													class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" value="1" />
												</div>
											</td>
											<!--end::Checkbox-->
										<td style="display:none"><img src="http://127.0.0.1:8000/admin-assets/media/avatars/150-26.jpg" width="50px"></td>

                                            
											<td>Genius Admin	</td>
											<td style="display:none">shaon@gmail.com	</td>
											<td style="display:none">0000000000000	</td>
											<td>Orders , Products , Vendors , Vendor Subscription Plans , Categories , Blog , Home Page Settings , Menu Page Settings , Language Settings , Seo Tools , Subscribers
	</td>


											<!--end::Date=-->
											<!--begin::Action=-->
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary"
													data-kt-menu-trigger="click"
													data-kt-menu-placement="bottom-end">Actions
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="svg-icon svg-icon-5 m-0">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															viewBox="0 0 24 24" fill="none">
															<path
																d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
													data-kt-menu="true">
													
													<div class="menu-item px-3">
														<a href="{{url('admin/manageroles_edit')}}"
															class="menu-link px-3">Edit</a>
													</div>

													<!--begin::Menu item-->
													
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
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
						<!--end::Container-->
					</div>


                    @endsection
