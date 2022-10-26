@extends('admin.layouts.app')
@section('content')
<head>
   <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</head>
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Front Cat </h1>
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
            <li class="breadcrumb-item text-muted">  Front Cat  </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark"> Add  Front Cat  Details</li>
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
<div class="content d-flex flex-column flex-column-fluid" style="margin-top:7pc" id="kt_content">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl" >
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
               <h3 class="fw-bolder m-0">Add  Front Cat Details</h3>
            </div>
            <!--end::Card title-->
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" action="{{ route('admin.frontcat_post')}}" class="form" method="post" enctype="multipart/form-data">
               @csrf
               <!--begin::Card body-->
               <div class="card-body border-top p-9">
                  <!--end::Input group-->
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
                              <input type="file" name="image" accept=".png, .jpg, .jpeg" class="@error('avatar') is-invalid @enderror" required/>
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
                        <div class="form-text">Allowed Maximum size: 3MB,  file types: png, jpg, jpeg. </div>
                        @error('avatar')
                        <div class="validation text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <!--end::Hint-->
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
				  <!--begin::Input group-->
				  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6"> Name </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                           <!--begin::Col-->
                           <div class="col-lg-12 fv-row">
                              <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('p_name') is-invalid @enderror" placeholder="Product name"  />
                              @error('name')
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
                     <label class="col-lg-4 col-form-label fw-bold fs-6">
                     <span class="required">Category</span>
                     <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Category of origination"></i>
                     </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <select  id="category" name="category_id" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Category..." class="@error('category_id') is-invalid @enderror form-select form-select-solid form-select-lg fw-bold" >
                           <option value="">Category...</option>
                           @foreach($categories as $category)
                           <option data-kt-flag="flags/afghanistan.svg" value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                        @error('category_id')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
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
                        <select id="subcat" name="subcategory_id" aria-label="Select a Sub Category" data-control="select2" data-placeholder="Select a unique Sub Category..." class="form-select form-select-solid form-select-lg @error('subcategory_id') is-invalid @enderror" >
                           <option value="">Select a Sub Category...</option>
                        </select>
                        @error('subcategory_id')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
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
                     <label class="col-lg-4 col-form-label fw-bold fs-6"> Description</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <textarea name="detail" id="editor">
                        </textarea>
                     </div>
                     <!--end::Col-->
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