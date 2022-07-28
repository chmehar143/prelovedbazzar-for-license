@extends('vendor.layouts.app')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container-xxl">
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
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">user NFT Event({{ date('M') }})</div>
                            <div class="fw-bold text-white">123</div>
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
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">Sponsored Nft ({{ date('M') }})</div>
                            <div class="fw-bold text-white">sponsored_post</div>
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
                            <div class="text-white fw-bolder fs-2 mb-2 mt-5">Featured Nft ({{ date('M') }})</div>
                            <div class="fw-bold text-white">feature_post</div>
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
                            <div class="chart-container">
                                <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
        </div><br><Br><br>
        <div class="g-5 gx-xxl-8">
                <!--begin::Tables Widget 10-->
                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Top 10 most nft view</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="border-0">
                                    <th class="p-0"></th>
                                    <th class="p-0 min-w-150px"></th>
                                    <th class="p-0 min-w-200px"></th>
                                    <th class="p-0 min-w-150px"></th>
                                    <th class="p-0 min-w-100px text-end"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
{{--                                <tbody>--}}
{{--                                @foreach($top_view as $view)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <!--begin::Avatar-->--}}
{{--                                            <div class="symbol symbol-45px me-5">--}}
{{--                                                <img alt="Pic" src="{{$view->file_path}}">--}}
{{--                                            </div>--}}
{{--                                            <!--end::Avatar-->--}}
{{--                                            <!--begin::Name-->--}}
{{--                                            <div class="d-flex justify-content-start flex-column">--}}
{{--                                                <a href="{{route('admin.nftview',$view->id)}}" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$view->nft_name}}</a>--}}
{{--                                                <a href="#" class="text-muted text-hover-primary fw-bold text-muted d-block fs-7">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Name-->--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$view->public_sale_price}}</a>--}}
{{--                                        <span class="text-muted fw-bold text-muted d-block fs-7">Public sale price</span>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-muted fw-bold text-end">{{$view->supply}}</td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <span class="badge badge-light-success">{{$view->blockchain}}</span>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <a href="{{route('admin.nftview',$view->id)}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">--}}
{{--                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->--}}
{{--                                            <span class="svg-icon svg-icon-3">--}}
{{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--																		<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black"></path>--}}
{{--																		<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black"></path>--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 10-->
            </div><br><br><br>

    </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{--        <script>--}}
{{--            const labels = <?php echo json_encode($month) ?>;--}}

{{--            const data = {--}}
{{--                labels: labels,--}}
{{--                datasets: [{--}}
{{--                    label: 'NFT Created In System',--}}
{{--                    backgroundColor: 'rgb(255, 99, 132)',--}}
{{--                    borderColor: 'rgb(255, 99, 132)',--}}
{{--                    data: <?php echo json_encode($month_wise_count) ?>,--}}
{{--                }]--}}
{{--            };--}}

{{--            const config = {--}}
{{--                type: 'line',--}}
{{--                data: data,--}}
{{--                options: {}--}}
{{--            };--}}
{{--        </script>--}}
{{--        <script>--}}
{{--            const myChart = new Chart(--}}
{{--                document.getElementById('myChart'),--}}
{{--                config--}}
{{--            );--}}
{{--        </script>--}}


{{--        <script>--}}
{{--            const data1 = {--}}
{{--                labels: [--}}
{{--                    'Simple NFT',--}}
{{--                    'Featured NFT',--}}
{{--                    'Sponsored NFT'--}}
{{--                ],--}}
{{--                datasets: [{--}}
{{--                    label: 'My System Details',--}}
{{--                    data: [--}}
{{--                        <?php echo json_encode($sponsored_nft) ?>,--}}
{{--                        <?php echo json_encode($simple_nft) ?>,--}}
{{--                        <?php echo json_encode($feature_nft) ?>--}}
{{--                    ],--}}
{{--                    backgroundColor: [--}}
{{--                        'rgb(255, 99, 132)',--}}
{{--                        'rgb(54, 162, 235)',--}}
{{--                        'rgb(255, 205, 86)'--}}
{{--                    ],--}}
{{--                    hoverOffset: 4--}}
{{--                }]--}}
{{--            };--}}
{{--            const config1 = {--}}
{{--                type: 'doughnut',--}}
{{--                data: data1,--}}
{{--            };--}}

{{--            const myChart1 = new Chart(--}}
{{--                document.getElementById('pie-chart'),--}}
{{--                config1--}}
{{--            );--}}
{{--        </script>--}}

@endsection
