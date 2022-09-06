@extends('vendor.layouts.app')

@section('content')
<head>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:5pc" id="kt_content">
                   
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
										<h3 class="fw-bolder m-0">Edit Affilate Proudct Details</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Content-->
								<div id="kt_account_settings_profile_details" class="collapse show">
									<!--begin::Form-->
									<form id="kt_account_profile_details_form" action="{{ route('vendor.affilateproduct_update', $product->id)}}" class="form" method="post" enctype="multipart/form-data">
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
															<input type="file" name="avatar"  accept=".png, .jpg, .jpeg" />
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
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
										
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Type</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<!--begin::Input-->
													<select name="p_type" aria-label="Select Product Type..." data-control="select2" data-placeholder="Select Product Type..." class="form-select form-select-solid form-select-lg">
														<option value="">Product Type</option>
														<option data-kt-flag="flags/indonesia.svg" value="{{$product->a_type}}" selected>{{$type[$product->a_type]}}</option>
														<option data-kt-flag="flags/indonesia.svg" value="0">Physical</option>
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
											<!--end::Input group-->
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
															<input type="text" name="p_name" value="{{$product->a_name}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name" value="Max" />
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
													<input type="text" name="p_sku" value="{{$product->a_sku}}" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes" />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->

											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Affiliate Link*</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder=" Product Affiliate Link*" value="https://abc.com" />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->

                                            <div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-bold fs-6">
													<span class="required">Product Condition</span>
													<!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i> -->
												</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<select name="country" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Product Condition..." class="form-select form-select-solid form-select-lg fw-bold">
														<option value="">Product Condition...</option>
														<option data-kt-flag="flags/afghanistan.svg" value="AF">New</option>
												
														<option data-kt-flag="flags/venezuela.svg" value="VE">Used</option>
													
													</select>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Size Quantity & Price</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Row-->
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-6 fv-row fv-plugins-icon-container">
															<input type="number" name="p_size_qnty" value="{{$product->a_size_qnty}}" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Size Quantity " value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div></div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-lg-6 fv-row fv-plugins-icon-container">
															<input type="number" name="p_size_price" value="{{$product->a_size_price}}" class="form-control form-control-lg form-control-solid" placeholder="Size Price" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div></div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Col-->
											</div>
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Estimated Shipping Time</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<input type="text" name="p_ship_time" value="{{$product->a_ship_time}}" class="form-control form-control-lg form-control-solid" placeholder="Product Estimated Shipping Time" value=" Shipping Time" />
												</div>
												<!--end::Col-->
											</div>

											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Allow Product Colors</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-2 fv-row">
													<input type="color" name="p_color" value="{{$product->a_color}}" class="form-control form-control-lg form-control-solid" placeholder="Product Estimated Shipping Time" value="" />
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
													<select  id="category" name="p_catog" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Category..." class="form-select form-select-solid form-select-lg fw-bold">
														<option value="{{$catog->id}}">{{$catog->name}}</option>
														@foreach($categories as $category)
														<option data-kt-flag="flags/afghanistan.svg" value="{{$category->id}}">{{$category->name}}</option>
														@endforeach
												
														<option data-kt-flag="flags/venezuela.svg" value="VE">Womencloth</option>
													
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
													<livewire:product /> 
												<div class="col-lg-8 fv-row">
													<!--begin::Input-->
													<select id="subcat" name="p_sub_catog" aria-label="Select a Sub Category" data-control="select2" data-placeholder="Select a Sub Category..." class="form-select form-select-solid form-select-lg">
														<option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
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
													<label class="col-lg-4 col-form-label required fw-bold fs-6">Child Category</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-8 fv-row">
														<!--begin::Input-->
														<select id="childcat" name="p_child_catog" aria-label="Select a Child Category" data-control="select2" data-placeholder="Select a Child Category..." class="form-select form-select-solid form-select-lg">
															<option value="{{$ch_cat->id}}">{{$ch_cat->name}}</option>
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
												<input type="text" name="p_new_price" value="{{$product->a_new_price}}"class="form-control form-control-lg form-control-solid" placeholder="eg 20" value="20" />
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
												<input type="text" name="p_old_price" value="{{$product->a_old_price}}" class="form-control form-control-lg form-control-solid" placeholder="eg 20" />
											</div>
											<!--end::Col-->
										</div>
										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Stock</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<input type="text" name="p_stock" value="{{$product->a_stock}}" class="form-control form-control-lg form-control-solid" placeholder="eg 20" />
											</div>
											<!--end::Col-->
										</div>

										<div class="row mb-6">
											<!--begin::Label-->
											<label class="col-lg-4 col-form-label required fw-bold fs-6">Product Description</label>
											<!--end::Label-->
											<!--begin::Col-->
											<div class="col-lg-8 fv-row">
												<textarea name="p_detail" id="editor" value="{{$product->a_detail}}">
												{{$product->a_detail}}
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
												<textarea name="p_r_policy" id="editornew" value="{{$product->a_r_policy}}">
												{{$product->a_r_policy}}
												</textarea>																						
											</div>
											<!--end::Col-->
										</div>
										

											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Size</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8 fv-row">
													<!--begin::Options-->
													<div class="d-flex align-items-center mt-3">
														<?php
														if($product->a_small == 1){
															$small = 'checked';
														}
														else{
															$small = '';
														} 
														if($product->a_medium == 1){
															$medium = 'checked';
														}
														else{
															$medium = '';
														}
														if($product->a_large == 1){
															$large = 'checked';
														}
														else{
															$large = '';
														}
														 
														?>
														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid me-5">
															<input class="form-check-input" name="small" type="checkbox" value="1"  {{$small}}/>
															<span class="fw-bold ps-2 fs-6">Small</span>
														</label>
														<!--end::Option-->
														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid">
															<input class="form-check-input" name="medium" type="checkbox" value="1" {{$medium}}/>
															<span class="fw-bold ps-2 fs-6">Medium</span>
														</label>

														<!--begin::Option-->
														<label class="form-check form-check-inline form-check-solid">
															<input class="form-check-input" name="large" type="checkbox" value="1" {{$large}}/>
															<span class="fw-bold ps-2 fs-6">Large</span>
														</label>
														<!--end::Option-->
													</div>
													<!--end::Options-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-0">
												<label class="col-lg-4 col-form-label required fw-bold fs-6">Status </label>
												<?php
												$status = '';
												if($product->a_status == 1){
													$status = 'checked';
												}
												?>
												<div class="col-lg-8 d-flex align-items-center">
													<div class="form-check form-check-solid form-switch fv-row">
														<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" {{$status}} />
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
					url:"{{url('/vendor/GetSubCat')}}",
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
					url:"{{url('/vendor/GetChildCat')}}",
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

