@extends('admin.layouts.app')

@section('content')
<head>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>


<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center"><div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Edit Role </h1>
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
										<li class="breadcrumb-item text-dark">  Edit Role</li>
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

<div class="content d-flex flex-column flex-column-fluid" style="margin-top:7pc" id="kt_content">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl" >
				<!--begin::Navbar-->
		<div class="card mb-5 mb-xl-10">
			
		</div>
				<!--end::Navbar-->
				<!--begin::Basic info-->
		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Add  Role Details</h3>
				</div>
				<!--end::Card title-->
			</div>
			<!--begin::Card header-->
			<!--begin::Content-->
			<div id="kt_account_settings_profile_details" class="collapse show">
				<!--begin::Form-->
				<form id="kt_account_profile_details_form" action="{{ route('admin.allproducts_store')}}" class="form" method="post" enctype="multipart/form-data">
					@csrf					
					<!--begin::Card body-->
					<div class="card-body border-top p-9">
						<!--begin::Input group-->
				
						<!-- <div class="row mb-0">
							<label class="col-lg-4 col-form-label "> </label>
						
							<div class="col-lg-8 d-flex align-items-center">
								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="allowmarketing">Status</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
								</div>
							</div>
                            
						</div> -->
                        <div class="container">
                            <div class="row">
                        <div class="col-md-6">
                        <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Orders">Orders *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Orders" checked="checked" />
								</div>
                                <Br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="AffiliateProducts"> Affiliate Products *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="AffiliateProducts" checked="checked" />
								</div>
                                <Br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="VendorsVendorVerifications"> Vendors & Vendor Verifications *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="VendorsVendorVerifications" checked="checked" />
								</div>
                                <Br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Categories">Categories *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Categories" checked="checked" />
								</div>
<br><br>

								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="ProductDiscussion">Product Discussion *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="ProductDiscussion" checked="checked" />
								</div>
<br><br>

								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Blog">Blog *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Blog" checked="checked" />
								</div>
<br><br>


								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Payment">Payment Setting *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Payment"  />
								</div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Products">Products *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Products" checked="checked" />
								</div>
                                <Br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Customers">Customers *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Customers" checked="checked" />
								</div>
                                <br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="VendorSubscriptionPlans">Vendor Subscription Plans  *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="VendorSubscriptionPlans" checked="checked" />
								</div>

                                <br><br>
                                <div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="BulkProductUpload">Bulk Product Upload *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="BulkProductUpload" checked="checked" />
								</div>
<br><br>
								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="SetCoupons">Set Coupons *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="SetCoupons" checked="checked" />
								</div>
								<br><br>

								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="Message">Message *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="Message" checked="checked" />
								</div>
								<br><br>

								<div class="form-check form-check-solid form-switch fv-row">
									<label class="form-check-label" for="SocialSetting">Social Setting *</label>

									<input class="form-check-input w-45px h-30px" type="checkbox" id="SocialSetting" checked="checked" />
								</div>
                        </div>


					</div>
</div>
                        </div>
					<!--end::Card body-->
					<!--begin::Actions-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
						<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Content-->
		</div>

				<!--end::Modals-->
			</div>
		</div>
	</div>
	<!--end::Container-->
</div>




<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	
     @endsection
