@extends('vendor.layouts.app')
@section('content')
<div class="toolbar py-2" id="kt_toolbar">
   <!--begin::Container-->
   <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
      <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
         <!--begin::Title-->
         <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc">  Subscription Plan </h1>
         <!--end::Title-->
         <!--begin::Separator-->
         <span class="h-20px border-gray-200 border-start mx-3"></span>
         <!--end::Separator-->
         <!--begin::Breadcrumb-->
         <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-2">
            <!--begin::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted"> Subscription </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">  Subscription Plan list </li>
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
<div id="kt_content_container" class="container-xxl" style="margin-top:10pc;">
   <!--begin::Pricing card-->
   <div class="card" id="kt_pricing">
      <!--begin::Card body-->
      <div class="card-body p-lg-17">
         <!--begin::Plans-->
         <div class="d-flex flex-column">
            <!--begin::Heading-->
            <div class="mb-13 text-center">
               <h1 class="fs-2hx fw-bolder mb-5">Choose Your Plan</h1>
               <div class="text-gray-400 fw-bold fs-5">If you need more info about our pricing, please check
                  <a href="#" class="link-primary fw-bolder">Pricing Guidelines</a>.
               </div>
               @if(session('message'))
                  <div class="alert alert-info">{{ session('message') }}</div>
               @endif
            </div>
            <!--end::Heading-->
            <!--begin::Nav group-->
            <!--end::Nav group-->
            <!--begin::Row-->
            <div class="row g-10">
               @foreach($plans as $plan)
               <!--begin::Col-->
               <div class="col-xl-4">
                  <div class="d-flex h-100 align-items-center">
                     <!--begin::Option-->
                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                        <!--begin::Heading-->
                        <div class="mb-7 text-center">
                           <!--begin::Title-->
                           <h1 class="text-dark mb-5 fw-boldest">{{$plan->title}}</h1>
                           <!--end::Title-->
                           <!--begin::Description-->
                           <div class="text-gray-400 fw-bold mb-5">Total allowed products are
                              <br>@if($plan->allowed_quantity==0) Unlimited @else {{ $plan->allowed_quantity }} @endif
                           </div>
                           <!--end::Description-->
                           <!--begin::Price-->
                           <div class="text-center">
                              <span class="mb-2 text-primary">pkr</span>
                              <span class="fs-3x fw-bolder text-primary" >{{$plan->cost}}</span>
                              <span class="fs-7 fw-bold opacity-50">/
                              <span data-kt-element="period">{{$plan->days}} days</span></span>
                           </div>
                           <!--end::Price-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Features-->
                        <div class="w-100 mb-10">
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 30 Project Integrations</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Analytics Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Finance Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Accounting Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                        </div>
                        <!--end::Features-->
                        <!--begin::Select-->
                        <div class="div d-flex">
                           <a href="{{route('vendor.subscriptionplan_create', $plan->id)}}" class="btn btn-sm btn-primary">Select</a>
                           <br>
                        </div>
                        <!--end::Select-->
                     </div>
                     <!--end::Option-->
                  </div>
               </div>
               <!--end::Col-->
               @endforeach
            </div>
            <!--end::Row-->
         </div>
         <!--end::Plans-->
      </div>
      <!--end::Card body-->
   </div>
   <!--end::Pricing card-->
   <!--begin::Pricing card-->
   <div class="card" id="kt_pricing">
      <!--begin::Card body-->
      <div class="card-body p-lg-17">
         <!--begin::Plans-->
         <div class="d-flex flex-column">
            <!--begin::Heading-->
            <div class="mb-13 text-center">
               <h1 class="fs-2hx fw-bolder mb-5">Your all purchased plan</h1>
               <div class="text-gray-400 fw-bold fs-5">If you need more info about our pricing, please check
                  <a href="#" class="link-primary fw-bolder">Pricing Guidelines</a>.
               </div>
            </div>
            <!--end::Heading-->
            <!--begin::Nav group-->
            <!--end::Nav group-->
            <!--begin::Row-->
            <div class="row g-10">
               @forelse($myplans as $myplan)
               <!--begin::Col-->
               <div class="col-xl-4">
                  <div class="d-flex h-100 align-items-center">
                     <!--begin::Option-->
                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                        <!--begin::Heading-->
                        <div class="mb-7 text-center">
                           <!--begin::Title-->
                           <h1 class="text-dark mb-5 fw-boldest">{{$myplan->subscription_plan->title}}</h1>
                           <!--end::Title-->
                           <!--begin::Description-->
                           <div class="text-gray-400 fw-bold mb-5">Total allowed products are
                              <br>@if($myplan->subscription_plan->allowed_quantity==0) Unlimited @else {{ $myplan->subscription_plan->allowed_quantity }} @endif
                           </div>
                           <!--end::Description-->
                           <!--begin::Price-->
                           <div class="text-center">
                              <span class="mb-2 text-primary">pkr</span>
                              <span class="fs-3x fw-bolder text-primary" >{{$myplan->subscription_plan->cost}}</span>
                              <span class="fs-7 fw-bold opacity-50">/
                              <span data-kt-element="period">{{$myplan->subscription_plan->days}} days</span></span>
                           </div>
                           <!--end::Price-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Features-->
                        <div class="w-100 mb-10">
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 30 Project Integrations</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Analytics Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                              <span class="svg-icon svg-icon-1 svg-icon-success">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Finance Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Accounting Module</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center mb-5">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center">
                              <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Unlimited Cloud Space</span>
                              <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                              <span class="svg-icon svg-icon-1">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black"></rect>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black"></rect>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </div>
                           <!--end::Item-->
                        </div>
                        <!--end::Features-->
                        <!--begin::Select-->
                        <div class="div d-flex">
                           <a href="@if($myplan->status == 1) {{route('vendor.subscriptionplan_create', $myplan->subscription_plan->id)}} 
                                 @else {{ route('vendor.subscriptionplan_view', $myplan->id)}} @endif " 
                              class="btn btn-sm btn-primary">{{ $status[$myplan->status] }}</a>
                           <br>
                           &nbsp;
                           &nbsp;
                           <a href="{{ route('vendor.subscriptionplan_view', $myplan->id)}}" class="btn btn-sm btn-primary">View</a>
                        </div>
                        <!--end::Select-->
                     </div>
                     <!--end::Option-->
                  </div>
               </div>
               <!--end::Col-->
			      @empty
			       <!--begin::Col-->
				   <div class="col-xl-12">
                  <div class="d-flex h-100 align-items-center">
                     <!--begin::Option-->
                     <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
						      <h3>You have no subscription plan purchased yet</h3>
                     </div>
                     <!--end::Option-->
                  </div>
               </div>
               <!--end::Col-->
               @endforelse
            </div>
            <!--end::Row-->
         </div>
         <!--end::Plans-->
      </div>
      <!--end::Card body-->
   </div>
   <!--end::Pricing card-->
</div>
<!--end::Container-->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
@endsection