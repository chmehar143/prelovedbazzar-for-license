<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head><base href="">
    <title>Admin | MarketPlace</title>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('admin-assets/media/logos/iconb.png')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{asset('admin-assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />


    <!-- <style>
        @media (min-width: 992px){
.aside {
    width: 163px;
}
        }
        </style> -->
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('admin.layouts.aside')
            <div class="wrapper d-flex flex-column " id="kt_wrapper">
                @include('admin.layouts.header')
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>


    <script>var hostUrl = "admin-assets/";</script>
    <script src="{{ asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('admin-assets/js/scripts.bundle.js')}}"></script>
    <script src="{{ asset('admin-assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/widgets.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/modals/create-app.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{ asset('admin-assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script src="{{ asset('admin-assets/js/custom/apps/customers/list/export.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/apps/customers/list/list.js')}}"></script>
    <script src="{{ asset('admin-assets/js/custom/apps/customers/add.js')}}"></script>

    <script>

 $('#dropdown a').click(function () {
   var val = parseInt($(this).attr("value"));
   if (val == 1) {

     $('#status').removeClass();
     $('#status').addClass("btn btn-success");
     $('#status').text ("Verified");
     $('#bar').removeClass("btn-success btn-warning btn-danger");
     $('#bar').addClass("btn-success");
   } else if (val == 2) {
     $('#status').removeClass();
     $('#status').addClass("btn btn-danger");
     $('#status').text ("Unverified");
     $('#bar').removeClass("btn-success btn-warning btn-danger");
     $('#bar').addClass("btn-danger");
   }else if (val == 3) {
     $('#status').removeClass();
     $('#status').addClass("btn btn-warning");
     $('#status').text ("Pending");
     $('#bar').removeClass("btn-success btn-warning btn-danger");
     $('#bar').addClass("btn-warning");
   }
 });

 </script>
</body>
</html>
