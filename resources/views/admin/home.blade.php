@extends('admin.layouts.app')
@section('content')
<!--begin::Toolbar-->
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <!--begin::Page title-->
      <div class="flex-grow-1 flex-shrink-0 me-5">
         <!--begin::Page title-->
         <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc">
               Dashboard
               <!--begin::Separator-->
               <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
               <!--end::Separator-->
               <!--begin::Description-->
               <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
               <!--end::Description-->
            </h1>
            <!--end::Title-->
         </div>
         <!--end::Page title-->
      </div>
      <!--end::Page title-->
   </div>
   <!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top:10pc">
   <!--begin::Container-->
   <div id="kt_content_container" class="container-xl">
      <div class="row g-5 g-xl-8">
         <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
               <!--begin::Body-->
               <div class="card-body">
                  <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                  <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="black" />
                        <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="black" />
                        <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="black" />
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
                  <div class="text-white fw-bolder fs-2 mb-2 mt-5">Today Vendor's Sale</div>
                  <div class="fw-bold text-white">${{ number_format((float)$vendor_sale, 2, '.', '') }}</div>
               </div>
               <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
         </div>
         <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
               <!--begin::Body-->
               <div class="card-body">
                  <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                  <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                        <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                        <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
                  <div class="text-white fw-bolder fs-2 mb-2 mt-5">Today Admin's Sale</div>
                  <div class="fw-bold text-white">${{ number_format((float)$admin_sale, 2, '.', '') }}</div>
               </div>
               <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
         </div>
         <div class="col-xl-4">
            <!--begin::Statistics Widget 5-->
            <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
               <!--begin::Body-->
               <div class="card-body">
                  <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                  <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="black" />
                        <path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="black" />
                     </svg>
                  </span>
                  <!--end::Svg Icon-->
                  <div class="text-white fw-bolder fs-2 mb-2 mt-5">Today's total sales</div>
                  <div class="fw-bold text-white">${{ number_format((float)$total_sale, 2, '.', '') }}</div>
               </div>
               <!--end::Body-->
            </a>
            <!--end::Statistics Widget 5-->
         </div>
      </div>
      <div class="row g-5 g-xl-8">
         <div class="col-xl-8">
            <div class="card">
               <div class="card-body">
                     <div class="chart-container">
                        <canvas id="myChart"></canvas>
                     </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4">
            <div class="card">
               <div class="card-body">
                  <h3 class="mb-5 text-center py-2">Last Month Progress</h3>
                  <div class="chart-container">
                     <canvas id="pie-chart"></canvas>
                  </div>
               </div>
            </div>
         </div>
      </div>
               <br><Br><br>
      <!--begin::Row-->
      <div class="g-5 gx-xxl-8">
         <!--begin::Tables Widget 10-->
         <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xl">
               <!--begin::Card-->
               <h1>Top trending products</h1>
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
                           <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Products">
                        </div>
                        <!--end::Search-->
                     </div>
                     <!--begin::Card title-->
                     <!--begin::Card toolbar-->
                     <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                           <div class="fw-bolder me-5">
                              <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                           </div>
                           <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
                     </div>
                     <!--end::Card toolbar-->
                  </div>
                  <!--end::Card header-->
                  <!--begin::Card body-->
                  <div class="card-body pt-0" >
                     <!--begin::Table-->
                     <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                           <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_customers_table" style="width: 1046px;">
                              <!--begin::Table head-->
                              <thead>
                                 <!--begin::Table row-->
                                 <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.5px;">
                                       <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
										 #
                                       </div>
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                       aria-label="Product Image : activate to sort column ascending" style="width: 180px;">Product Image </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                       aria-label=" Name : activate to sort column ascending" style="width: 192.25px;"> Name </th>
                                    <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                       aria-label=" Price : activate to sort column ascending" style="width: 100px;"> Price </th>
                                    <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                       aria-label="Status : activate to sort column ascending" style="width: 100px;">Status </th>
                                    <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                       aria-label="Status : activate to sort column ascending" style="width: 50px;">Sale</th>
                                    <th class="min-w-125px sorting_disabled" style="display: none; width: 0px;" rowspan="1" colspan="1"
                                       aria-label="Pre-Sale Price">Pre-Sale Price</th>
                                 </tr>
                                 <!--end::Table row-->
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              <tbody class="fw-bold text-gray-600">
                                 @foreach($products as $product)
                                 <tr class="odd" id="">
                                    <!--begin::Checkbox-->
                                    <td>
                                       <div class="form-check form-check-sm form-check-custom form-check-solid">
										{{$loop->iteration}}
                                       </div>
                                    </td>
                                    <!--end::Checkbox-->
                                    <td> 
                                       @foreach($product->slice(0, 1) as $unit)
                                       <img src="{{asset('storage/uploads/products/'.$unit->p_image)}}" width="50px">
                                       @endforeach
                                    </td>
                                    <td>
                                       @foreach($product->slice(0, 1) as $unit)
                                       {{$unit->p_name}}
                                       @endforeach
                                    </td>
                                    <td>
                                       @foreach($product->slice(0, 1) as $unit)
                                       ${{$unit->p_new_price}}
                                       @endforeach
                                    </td>
                                    <td data-order="Invalid date">
                                       @foreach($product->slice(0, 1) as $unit)
                                       <span class="badge @if($unit->status == 1) badge-light-success @else badge-light-danger @endif">{{$status[$unit->status]}}</span>
                                       @endforeach
                                    </td>
                                    <td data-order="Invalid date">
                                 
                                       <span class="badge @if($product->sum('pro_qnty') >= 100) badge-light-success @else badge-light-danger @endif">{{$product->sum('pro_qnty')}}</span>

                                    </td>
                                    <!--end::Date=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                       <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                          Actions
                                          <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                          <span class="svg-icon svg-icon-5 m-0">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                             </svg>
                                          </span>
                                          <!--end::Svg Icon-->
                                       </a>
                                       <!--begin::Menu-->
                                       <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                          <!--begin::Menu item-->
                                          <div class="menu-item px-3">
                                             @foreach($product->slice(0, 1) as $unit)
                                             <a href="{{ route('admin.allproducts_view', $unit->pro_id) }}" class="menu-link px-3">View</a>
                                             @endforeach
                                          </div>
                                          <!--end::Menu item-->
                                       </div>
                                       <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                 </tr>
                                 @endforeach
                              </tbody>
                              <!--end::Table body-->
                           </table>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--end::Table-->
               </div>
               <!--end::Card body-->
            </div>
			   <!--end::Container-->
         </div>
		   <!--end::Tables Widget 10-->
      </div>
   </div>
   <!--end::Container-->
</div>
<!--end::Tables Widget 10-->
</div>
<!--end::Row-->
</div>
<!--end::Container-->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labels = <?php echo json_encode($month) ?>;

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Month wise, No. of order placed',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo json_encode($month_wise_count) ?>,
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {}
            };
        </script>
        <script>
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>


        <script>
            const data1 = {
                labels: [
                    ' Vendors ',
                    ' Orders ',
                    ' Users '
                ],
                datasets: [{
                    label: 'My System Details',
                    data: [
                        <?php echo json_encode($total_vendor) ?>,
                        <?php echo json_encode($total_order) ?>,
                        <?php echo json_encode($total_user) ?>
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };
            const config1 = {
                type: 'doughnut',
                data: data1,
            };

            const myChart1 = new Chart(
                document.getElementById('pie-chart'),
                config1
            );
        </script>
<script>
   function deleteProduct(id) {
       Swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
       }).then((result) => {
           if (result.isConfirmed) {
               $.ajax({
                   url: "{{url('admin/product_del')}}"+ '/' + id,
                   success: function(data) {
                       $("#nft_row_" +id).remove();
                       Swal.fire(
                           'Deleted!',
                           'Product has been deleted.',
                           'success'
                       )
                   }
               });
           }
       })
   }
</script>
@endsection