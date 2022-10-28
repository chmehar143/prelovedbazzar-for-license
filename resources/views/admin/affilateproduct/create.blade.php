@extends('admin.layouts.app')

@section('content')
<head>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center"><div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Affiliate Products </h1>
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
										<li class="breadcrumb-item text-muted"> Products </li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Create Affiliate Products  </li>
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
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--begin::Container-->
						<div id="kt_content_container" class="container-xl" >
							<!--begin::Navbar-->
							<div class="card mb-5 mb-xl-10" >

							</div>
							<!--end::Navbar-->
							<!--begin::Basic info-->
							<div class="card mb-5 mb-xl-10">
								<!--begin::Card header-->
								<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">Crate Affilate Proudct Details</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Content-->
								<div id="kt_account_settings_profile_details" class="collapse show">
									<!--begin::Form-->
									<form id="kt_account_profile_details_form" action="{{ route('admin.affilateproduct_store')}}" class="form" method="post" enctype="multipart/form-data">
										@csrf
										<!--begin::Card body-->
										<div class="card-body border-top p-9">

											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-bold required fs-6">Current Featured Image
												</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-26.jpg)"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="avatar" accept=".png, .jpg, .jpeg" class="@error('avatar') is-invalid @enderror" required/>
															<input type="hidden" name="avatar_remove" />
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed Maximum size: 3MB,  file types: png, jpg, jpeg.</div>
													@error('avatar')
													<div class="validation mt-1 text-danger">{{ $message }}</div>
													@enderror
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Type</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<!--begin::Input-->
													<select name="a_type" aria-label="Select Product Type..." data-control="select2" data-placeholder="Select Product Type..." class="form-select form-select-solid form-select-lg" required>
														<option value="">Product Type</option>
														<option data-kt-flag="flags/indonesia.svg" value="0" selected>Physical</option>
														<option data-kt-flag="flags/indonesia.svg" value="1">Digital</option>
														<option data-kt-flag="flags/indonesia.svg" value="2">License</option>
													</select>
													<!--end::Input-->
													<!--begin::Hint-->
													<!-- <div class="form-text">Please select a preferred language, including date, time, and number formatting.</div> -->
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>

											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Name </label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Row-->
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-12 fv-row">
															<input type="text" name="a_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('a_name') is-invalid @enderror" placeholder="Product name"  />
															@error('a_name')
                                                            <div class="validation mt-1 text-danger">{{ $message }}</div>
                                                            @enderror
														</div>
														<!--end::Col-->
														<!--begin::Col-->

														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Sku</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<input type="text" name="a_sku" class="form-control form-control-lg form-control-solid @error('a_sku') is-invalid @enderror" placeholder="Product Sku "  required/>
														@error('a_sku')
                                                            <div class="validation mt-1 text-danger">{{ $message }}</div>
                                                        @enderror
												</div>

												<!--end::Col-->
											</div>

                                            <div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Affiliate Link</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<input type="text" name="plink" class="form-control form-control-lg form-control-solid" placeholder=" Product Affiliate Link" />
												</div>
												<!--end::Col-->
											</div>

                                            <div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-bold fs-6">
													<span class="required">Product Condition</span>
													<!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
												</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<select name="con" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Product Condition..." class="form-select form-select-solid form-select-lg fw-bold ">
													<option data-kt-flag="flags/afghanistan.svg" value="0" >{{$conditions[0]}}</option>
													<option data-kt-flag="flags/afghanistan.svg" value="1" >{{$conditions[1]}}</option>
													<option data-kt-flag="flags/afghanistan.svg" value="2" >{{$conditions[2]}}</option>
													<option data-kt-flag="flags/afghanistan.svg" value="3" >{{$conditions[3]}}</option>
													</select>

												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->


											<!--end::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Estimated Shipping Time in Days</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<input type="number" name="a_ship_time" class="form-control form-control-lg form-control-solid " min="1" max="60" placeholder="Product Estimated Shipping Time in Days @error('a_ship_time') is-invalid @enderror" required/>
													@error('a_ship_time')
														<div class="validation mt-1 text-danger">{{ $message }}</div>
													@enderror
												</div>
												<!--end::Col-->
											</div>

											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Allow Product Colors</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row">
													<input type="color" name="a_color" value="#63c7de" class="form-control form-control-lg form-control-solid @error('a_color') is-invalid @enderror"  vrequired/>
													@error('a_color')
														<div class="validation mt-1 text-danger">{{ $message }}</div>
													@enderror
												</div>
												<!--end::Col-->
											</div>
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-bold fs-6">
													<span class="required">Category</span>
													<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i>
												</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<select  id="category" name="a_catog" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Category..." class="form-select form-select-solid form-select-lg fw-bold" >
														<option value="">Category...</option>
														@foreach($categories as $category)
														<option data-kt-flag="flags/afghanistan.svg" value="{{$category->id}}">{{$category->name}}</option>
														@endforeach
													</select>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Sub Category</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<!--begin::Input-->
													<select id="subcat" name="a_sub_catog" aria-label="Select a Sub Category" data-control="select2" data-placeholder="Select a Sub Category..." class="form-select form-select-solid form-select-lg @error('a_sub_catog') is-invalid @enderror" required>
														<option value="">Select a Sub Category...</option>
													</select>

													<!--end::Input-->
													<!--begin::Hint-->
													<!-- <div class="form-text">Please select a preferred language, including date, time, and number formatting.</div> -->
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
												<!--begin::Input group-->
												<div class="row mb-6">
													<!--begin::Label-->
													<label class="col-lg-4 col-form-label fw-bold fs-6">Child Category</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<!--begin::Input-->
														<select id="childcat" name="a_child_catog" aria-label="Select a Child Category" data-control="select2" data-placeholder="Select a Child Category..." class="form-select form-select-solid form-select-lg">
															<option value="">Select a Child Category...</option>
														</select>
														<!--end::Input-->
														<!--begin::Hint-->
														<!--end::Hint-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Current Price</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="a_new_price" class="form-control form-control-lg form-control-solid @error('a_new_price') is-invalid @enderror" placeholder="eg 20" required/>
												@error('a_new_price')
													<div class="validation mt-1 text-danger">{{ $message }}</div>
												@enderror
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->


										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Previous Price</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="a_old_price" class="form-control form-control-lg form-control-solid @error('a_old_price') is-invalid @enderror" placeholder="eg 20" />
												@error('a_old_price')
													<div class="validation mt-1 text-danger">{{ $message }}</div>
												@enderror
											</div>
											<!--end::Col-->
										</div>
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Stock</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="a_stock" class="form-control form-control-lg form-control-solid @error('a_stock') is-invalid @enderror " placeholder="eg 20"  required/>
												@error('a_stock')
													<div class="validation mt-1 text-danger">{{ $message }}</div>
												@enderror
											</div>
											<!--end::Col-->
										</div>


											<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Description</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">

												<textarea name="a_detail" id="editor">
												</textarea>
																						</div>
											<!--end::Col-->
											</div>

											<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Buy/Return Policy</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">

												<textarea name="a_r_policy" id="editornew">
												
												</textarea>
											</div>
											<!--end::Col-->
											</div>

                                        		<!--begin::Input group-->
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label  fw-bold fs-6">Youtube Video URL</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="url_link" class="form-control form-control-lg form-control-solid" placeholder="youtube url"  />
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->

											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Size</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<!--begin::Options-->
													<div class="d-flex align-items-center mt-3">
														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid me-5">
															<input class="form-check-input" name="small" type="checkbox" value="1" />
															<span class="fw-bold ps-2 fs-6">Small</span>
														</label>
														<!--end::Option-->
														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid">
															<input class="form-check-input" name="medium" type="checkbox" value="1"/>
															<span class="fw-bold ps-2 fs-6">Medium</span>
														</label>

														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid">
															<input class="form-check-input" name="large" type="checkbox" value="1" />
															<span class="fw-bold ps-2 fs-6">Large</span>
														</label>
														<!--end::Option-->
													</div>
													<!--end::Options-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
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
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#category').change(function(){
				let cid=$(this).val();
				$('#childcat').html('<option value="">Select City</option>')
				$.ajax({
					url:"{{url('/admin/GetSubCat')}}",
					type:'post',
					data:'cid='+cid+'&_token={{csrf_token()}}',
					success:function(result){
						$('#subcat').html(result)
					}
				});
			});

			$('#subcat').change(function(){
				let sid=$(this).val();
				$.ajax({
					url:"{{url('/admin/GetChildCat')}}",
					type:'post',
					data:'sid='+sid+'&_token={{csrf_token()}}',
					success:function(result){
						$('#childcat').html(result)
					}
				});
			});

		});
	</script>

    @endsection
