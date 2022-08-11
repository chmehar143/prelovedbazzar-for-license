
@extends('vendor.layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top:5pc">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card body-->
								<div class="card-body p-0">
									<!--begin::Wrapper-->
									<div class="card-px text-center py-20 my-10">
										<!--begin::Title-->
										<h2 class="fs-2x fw-bolder mb-10">Upload a File *</h2>
										<div class="csv-icon">
											<i class="fas fa-file-csv" style="font-size: 5pc;"></i>
									</div><br><Br>
										<!--end::Title-->
										<!--begin::Description-->
										<input type="file" name="file" class="form-control" ><br><br>
										<!--end::Description-->
										<!--begin::Action-->
										<a href="#" class="btn btn-primary" >Start Import</a>
										
										<a href="#" class="btn btn-primary" download>Download Sample CSV File</a>
										<!--end::Action-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Illustration-->
									<div class="text-center px-4">
										<img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/2.png" />
									</div>
									<!--end::Illustration-->
								</div>
								<!--end::Card body-->
							</div>
</div>
</div>
</div>

							
						

						
						
                    @endsection