
@extends('admin.layouts.app')

@section('content')
<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center"><div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Vendors </h1>
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
										<li class="breadcrumb-item text-muted"> Vendor </li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">  View Vendor </li>
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
<div id="kt_content_container" class="container-xl" style="margin-top:11pc;margin-left:5pc">
							<!--begin::Navbar-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                  <!--begin::Card title-->
                                  <div class="card-title">
                                    <h2 class="fw-bolder mb-0">View  Vendor Detail</h2>

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
                                        <div class="col-md-4">
                                                        <div class="user-image">
                                                <img src="https://royalscripts.com/demo/kingcommerce/assets/images/noimage.png" alt="No Image">  <br>
                                               <a type="button" class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal" >Send Message</a>                                                        </div>
                                                    </div>

                                        <div class="flex-equal me-5">
                                          <table class="table table-flush fw-bold gy-1">
                                            <tbody>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Vendor ID#	 </td>
                                              <td class="text-gray-800">{{$vendor->id}}</td>

                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Store Name	  </td>
                                              <td class="text-gray-800">{{$vendor->shop_name}}</td>
                                            </tr>



                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Owner Name	</td>
                                              <td class="text-gray-800">{{$vendor->name}}</td>

                                            </tr>




                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Email</td>

                                              <td class="text-gray-800">{{$vendor->email}}</td>

                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Shop Number	</td>

                                              <td class="text-gray-800">{{$vendor->id}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Registration Number	</td>
                                              <td class="text-gray-800">{{$vendor->registration}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-muted min-w-125px w-125px"> Shop Address	</td>
                                              <td class="text-gray-800">222</td>
                                            </tr>





                                          </tbody></table>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="flex-equal">
                                          <table class="table table-flush fw-bold gy-1">
                                            <tbody>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Message</td>

                                              <td class="text-gray-800">{{$vendor->message}}</td>

                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Total Product(s)	 </td>

                                              <td class="text-gray-800 ml-2">{{$total_added}}</td>

                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px"> Joined	 </td>
                                              <td class="text-gray-800">WoMen</td>
                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px"> Current Balance </td>

                                              <td class="text-gray-800">565</td>

                                            </tr>

                                            <tr>
                                              <td class="text-muted min-w-125px w-125px"> Shop Details	</td>

                                              <td class="text-gray-800">{{$vendor->shop_detail}}</td>

                                            </tr>





                                            <tr>
                                              <td class="text-muted min-w-125px w-125px">Status </td>

                                              <td class="text-gray-800">@if($vendor->status == 1) verified

                                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-success">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                                  </svg>
                                                </span>

												@else Unverirfied
												<span class="svg-icon svg-icon-2 svg-icon-danger">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
														<path fill-rule="evenodd" d="M6.415.52a2.678 2.678 0 013.17 0l.928.68c.153.113.33.186.518.215l1.138.175a2.678 2.678 0 012.241 2.24l.175 1.138c.029.187.102.365.215.518l.68.928a2.678 2.678 0 010 3.17l-.68.928a1.179 1.179 0 00-.215.518l-.175 1.138a2.678 2.678 0 01-2.241 2.241l-1.138.175a1.179 1.179 0 00-.518.215l-.928.68a2.678 2.678 0 01-3.17 0l-.928-.68a1.179 1.179 0 00-.518-.215L3.83 14.41a2.678 2.678 0 01-2.24-2.24l-.175-1.138a1.179 1.179 0 00-.215-.518l-.68-.928a2.678 2.678 0 010-3.17l.68-.928a1.17 1.17 0 00.215-.518l.175-1.14a2.678 2.678 0 012.24-2.24l1.138-.175c.187-.029.365-.102.518-.215l.928-.68zm2.282 1.209a1.178 1.178 0 00-1.394 0l-.928.68a2.678 2.678 0 01-1.18.489l-1.136.174a1.178 1.178 0 00-.987.987l-.174 1.137a2.678 2.678 0 01-.489 1.18l-.68.927c-.305.415-.305.98 0 1.394l.68.928c.256.348.423.752.489 1.18l.174 1.136c.078.51.478.909.987.987l1.137.174c.427.066.831.233 1.18.489l.927.68c.415.305.98.305 1.394 0l.928-.68a2.678 2.678 0 011.18-.489l1.136-.174c.51-.078.909-.478.987-.987l.174-1.137c.066-.427.233-.831.489-1.18l.68-.927c.305-.415.305-.98 0-1.394l-.68-.928a2.678 2.678 0 01-.489-1.18l-.174-1.136a1.178 1.178 0 00-.987-.987l-1.137-.174a2.678 2.678 0 01-1.18-.489l-.927-.68zM9 11a1 1 0 11-2 0 1 1 0 012 0zM6.92 6.085c.081-.16.19-.299.34-.398.145-.097.371-.187.74-.187.28 0 .553.087.738.225A.613.613 0 019 6.25c0 .177-.04.264-.077.318a.956.956 0 01-.277.245c-.076.051-.158.1-.258.161l-.007.004c-.093.056-.204.122-.313.195a2.416 2.416 0 00-.692.661.75.75 0 001.248.832.956.956 0 01.276-.245 6.3 6.3 0 01.26-.16l.006-.004c.093-.057.204-.123.313-.195.222-.149.487-.355.692-.662.214-.32.329-.702.329-1.15 0-.76-.36-1.348-.862-1.725A2.76 2.76 0 008 4c-.631 0-1.154.16-1.572.438-.413.276-.68.638-.849.977a.75.75 0 001.342.67z"/>
													</svg>
                                                </span>
												@endif

                                                <!--end::Svg Icon-->
                                              </td>
                                            </tr>
                                          </tbody></table>
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
                              <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--begin::Container-->
						<div id="kt_content_container" class="container-xl" >
							<!--begin::Card-->
                            <h2>Products Added

</h2>


							<div class="card">
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
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search  Products">
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

											<th class="min-w-50px pe-2">
												Sr No.

											</th>
											<th class="min-w-125px"> Product ID	 </th>

											<th class="min-w-125px">Type	 </th>
											<th class="min-w-125px"> Stock </th>
											<th class="min-w-125px"> Price </th>



											<th class="min-w-125px">Status </th>
											<th class="min-w-125px" style="display:none">Status </th>




										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="fw-bold text-gray-600">

										<?php $i = 0; ?>
										@foreach($products as $product)
										<?php $i = $i+1; ?>
										<tr>
											<!--begin::Checkbox-->
											<td class="min-w-50px">{{$i}}</td>
											<td class="min-w-125px">{{$product->id}}</td>
											<td class="min-w-125px"><span class="badge badge-light-success">{{$type[$product->p_type]}}</span></td>
											<td class="min-w-125px">{{$product->p_stock}}</td>
											<td class="min-w-125px">{{$product->p_new_price}}</td>
											<td class="min-w-125px"><span class="badge badge-light-success">{{$status[$product->status]}}</span></td>
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

						</div>

            <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bolder">Message</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<!--begin::Form-->
											<form id="kt_customers_export_form" class="form" action="#">
												<!--begin::Input group-->


                                                <div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Email:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Email" name="email" />
													<!--end::Input-->
												</div>

                                                <div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Order Number:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Order Number" name="texxt" />
													<!--end::Input-->
												</div>

                                                <div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Subject</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Subject" name="text" />
													<!--end::Input-->
												</div>

                                                <div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5"> Message:</label>
													<!--end::Label-->
													<!--begin::Input-->
                                                    <textarea name="company" class="form-control form-control-lg form-control-solid" placeholder="Your Message " rows="6"></textarea>													<!--end::Input-->
												</div>


												<!--begin::Row-->

												<!--end::Row-->
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
													<button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>


                    @endsection
