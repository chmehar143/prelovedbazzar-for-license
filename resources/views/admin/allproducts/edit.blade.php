@extends('admin.layouts.app')
@section('content')
<head>
   <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<head>
   
<style>
   .preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}


   </style>
</head>
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> All Products </h1>
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
            <li class="breadcrumb-item text-dark"> Edit Products </li>
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
               <h3 class="fw-bolder m-0">Edit  Proudct Details</h3>
            </div>
            <!--end::Card title-->
         </div>
         <!--begin::Card header-->
         <!--begin::Content-->
         <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form"
               action="{{ route('admin.allproducts_update', $product->id)}}"
               class="form" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
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
                           <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('storage/uploads/products/'.$product->p_image)}}')">
                           </div>
                           <!--end::Preview existing avatar-->
                           <!--begin::Label-->
                           <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                              <i class="bi bi-pencil-fill fs-7"></i>
                              <!--begin::Inputs-->
                              <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
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
                    <!--end::Input group-->
                    <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Sub Category Images </label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                     <div class="container">
                        <fieldset class="form-group">
                           <a href="javascript:void(0)" onclick="$('#pro-image').click()" style="font-size:20px">Upload Image</a>
                           <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
                        </fieldset>
                        <div class="preview-images-zone">
                           <div class="preview-image preview-show-1">
                                 <div class="image-cancel" data-no="1">x</div>
                                 <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
                                 <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                           </div>
                           <div class="preview-image preview-show-2">
                                 <div class="image-cancel" data-no="2">x</div>
                                 <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                 <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2" class="btn btn-light btn-edit-image">edit</a></div>
                           </div>
                           <div class="preview-image preview-show-3">
                                 <div class="image-cancel" data-no="3">x</div>
                                 <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                 <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>
                           </div>
                        </div>
                     </div>
                                       </div>
                     </div>
                     <br>
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

                              <input type="text" name="p_name" value="{{$product->p_name}}" class="@error('p_name') is_invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
                              @error('p_name')
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
                        <input type="text" name="p_sku" value="{{$product->p_sku}}" class="@error('p_sku') is_invalid @enderror form-control form-control-lg form-control-solid"  required/>
                        @error('p_sku')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
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
                        <select name="con" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Product Condition..." class="@error('con') is-invalid @enderror form-select form-select-solid form-select-lg fw-bold">
                        <option data-kt-flag="flags/afghanistan.svg" value="0"  @if($product->con == 0) seleceted @endif >{{$conditions[0]}}</option>														
                        <option data-kt-flag="flags/afghanistan.svg" value="1"  @if($product->con == 1) seleceted @endif >{{$conditions[1]}}</option>														
                        <option data-kt-flag="flags/afghanistan.svg" value="2"  @if($product->con == 2) seleceted @endif >{{$conditions[2]}}</option>														
                        <option data-kt-flag="flags/afghanistan.svg" value="3"  @if($product->con == 3) seleceted @endif >{{$conditions[3]}}</option>														
                        </select>
                        @error('con')
                           <div class="validation mt-1 text-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--end::Col-->
                  </div>
                  <!--end::Input group-->
                  <div class="row mb-6">
                     <!--begin::Label-->
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Product Estimated Shipping Time</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <input type="text" name="p_ship_time" value="{{$product->p_ship_time}}" class="form-control form-control-lg form-control-solid @error('p_ship_time') is-invalid @enderror" required />
                        @error('p_ship_time')
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
                        <input type="color" name="p_color" value="{{$product->p_color}}" class="form-control form-control-lg form-control-solid @error('p_color') is-invalid @enderror " />
                        @error('p_ship_time')
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
                        <select  id="category" name="p_catog" aria-label="Select a Category" data-control="select2" data-placeholder="Select a Category..." class="form-select form-select-solid form-select-lg fw-bold @error('p_catog') is-invalid @enderror" required>
                           <option value="">Category...</option>
                           @foreach($categories as $category)
                           <option data-kt-flag="flags/afghanistan.svg" value="{{$category->id}}" @if($category->id == $product->p_catog ) selected @endif >{{$category->name}}</option>
                           @endforeach
                        </select>
                        @error('p_catog')
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
                        <select id="subcat" name="p_sub_catog" aria-label="Select a Sub Category" data-control="select2" data-placeholder="Select a Sub Category..." class=" @error('p_sub_catog') is-invalid @enderror form-select form-select-solid form-select-lg">
                           <option value="{{$product->p_sub_catog}}"  selected>{{$product->sub_name}}</option>
                        </select>
                        @error('p_sub_catog')
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
                     <label class="col-lg-4 col-form-label required fw-bold fs-6">Child Category</label>
                     <!--end::Label-->
                     <!--begin::Col-->
                     <div class="col-lg-8 fv-row">
                        <!--begin::Input-->
                        <select id="childcat" name="p_child_catog" aria-label="Select a Child Category" data-control="select2" data-placeholder="Select a Child Category..." class="form-select form-select-solid form-select-lg">
                           <option value="{{$product->p_child_catog}}" selected>{{$product->child_name}}</option>
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
                        <input type="text" name="p_new_price" value="{{$product->p_new_price}}"class="form-control form-control-lg form-control-solid @error('p_new_price') is-invalid @enderror" />
                        @error('p_new_price')
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
                        <input type="text" name="p_old_price" value="{{$product->p_old_price}}" class="form-control form-control-lg form-control-solid @error('p_old_price') is-invalid @enderror " />
                        @error('p_old_price')
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
                        <input type="text" name="p_stock" value="{{$product->p_stock}}" class="form-control form-control-lg form-control-solid @error('p_stock') is-invalid @enderror" required />
                        @error('p_stock')
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
                        <textarea name="p_detail" id="editor" value="{{$product->p_detail}}">

                        {{$product->p_detail}}

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
                        <textarea name="p_r_policy" id="editornew" value="{{$product->p_r_policy}}">

                        {{$product->p_r_policy}}
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
                           <!--begin::Option-->
                           <label class="form-check form-check-inline form-check-solid me-5">
                           <input class="form-check-input" name="small" type="checkbox" value="1"  @if($product->small == 1) checked @endif />
                           <span class="fw-bold ps-2 fs-6">Small</span>
                           </label>
                           <!--end::Option-->
                           <!--begin::Option-->
                           <label class="form-check form-check-inline form-check-solid">
                           <input class="form-check-input" name="medium" type="checkbox" value="1" @if($product->medium == 1) checked @endif/>
                           <span class="fw-bold ps-2 fs-6">Medium</span>
                           </label>
                           <!--begin::Option-->
                           <label class="form-check form-check-inline form-check-solid">
                           <input class="form-check-input" name="large" type="checkbox" value="1" @if($product->large == 1) checked @endif/>
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
                     <div class="col-lg-8 d-flex align-items-center">
                        <div class="form-check form-check-solid form-switch fv-row">
                           <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" name="checkbox" @if($product->status == 1) checked @endif />
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
   		$('#childcat').html('<option value="">Select Child Category</option>')
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

<script>
   $(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}


   </script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
