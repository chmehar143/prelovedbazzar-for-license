@extends('vendor.layouts.app')

@section('content')
<head>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top:5pc">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
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
										<h3 class="fw-bolder m-0">Edit Withdraw Details</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Content-->
								<div id="kt_account_settings_profile_details" class="collapse show">
									<!--begin::Form-->
									<form id="kt_account_profile_details_form" class="form">
										<!--begin::Card body-->
										<div class="card-body border-top p-9">
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-bold fs-6">
													<span class="required">Withdraw Method                                                     </span>
													<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i>
												</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<select name="country" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Withdraw Method 
                                                    ..." class="form-select form-select-solid form-select-lg fw-bold">
														<option value="">Withdraw Method...</option>
														<option data-kt-flag="flags/afghanistan.svg" value="AF">paypal</option>
												
														<option data-kt-flag="flags/venezuela.svg" value="VE">payoneer</option>
													
													</select>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Withdraw Amount</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Row-->
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-12 fv-row">
															<input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder=" 1002" value="2002" />
														</div>
														<!--end::Col-->
														<!--begin::Col-->
													
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Col-->
											</div>
							

										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label  fw-bold fs-6">Additional Reference(Optional)
                                            </label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<textarea name="content" id="editor">
													&lt;p&gt;This is some sample content.&lt;/p&gt;
												</textarea>
																						</div>
											<!--end::Col-->
										</div>

										<div class="row mb-0">
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Status </label>
										
											<div class="col-lg-8 d-flex align-items-center">
												<div class="form-check form-check-solid form-switch fv-row">
													<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
													<label class="form-check-label" for="allowmarketing"></label>
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
						<!--end::Container-->
					</div>
</div>
<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.catch( error => {
					console.error( error );
				} );
		</script>
			<script>
				ClassicEditor
					.create( document.querySelector( '#editornew' ) )
					.catch( error => {
						console.error( error );
					} );
			</script>
		<!--end::Scr

@endsection
