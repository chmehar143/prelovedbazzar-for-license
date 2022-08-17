@extends('admin.layouts.app')

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
                        <h3 class="fw-bolder m-0">Add NEW CHILD CATEGORY</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form  action="{{route('admin.child_category_store')}}"  method="POST" class="form">
                    {{csrf_field()}}
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Sub Category </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select  aria-label="Select a Timezone" name="subcategory_id" id="catagories" data-control="select2" data-placeholder="Select a Category.." class="form-select form-select-solid form-select-lg @error('subcategory_id') is-invalid @enderror">
                                        <option value="">Select a Category..</option>
                                        @foreach($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('subcategory_id')
                                    <div class="validation">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--end::Col-->
                            </div>

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
                                            <input type="text" class=" @error('name') is-invalid @enderror form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="name" placeholder="{{ __('Enter Name') }}" required="" value="">
                                            @error('name')
                                            <div class="validation mt-1">{{ $message }}</div>
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
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> Slug</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" class=" @error('slug') is-invalid @enderror form-control form-control-lg form-control-solid" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">
                                    @error('slug')
                                    <div class="validation mt-1">{{ $message }}</div>
                                    @enderror
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

@endsection
