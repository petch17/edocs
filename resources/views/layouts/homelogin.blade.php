<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->

<head>
  <!--begin::Base Path (base relative path for assets of this page) -->
  <base href="../../../../">
  <!--end::Base Path -->
  <meta charset="utf-8" />

  <title>หน้าเข้าสู่ระบบ</title>
  <meta name="description" content="Login page example">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--begin::Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Asap+Condensed:500">
  <!--end::Fonts -->


  <!--begin::Page Custom Styles(used by this page) -->
  <link href="{{asset('assets/css/demo11/pages/login/login-3.css')}}" rel="stylesheet" type="text/css" />
  <!--end::Page Custom Styles -->

  <!--begin:: Global Mandatory Vendors -->
  {{-- <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" /> --}}
  <!--end:: Global Mandatory Vendors -->

  <!--begin::Global Theme Styles(used by all pages) -->

  <link href="{{asset('assets/css/demo11/style.bundle.css')}}" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles -->

  <!--begin::Layout Skins(used by all pages) -->
  <!--end::Layout Skins -->

  <link rel="shortcut icon" href="{{asset('img/e.png ')}}" />
  @yield('css')
</head>
<!-- end::Head -->
<style>
  body  {
    background-image: url("{{asset('assets/media//bg/bg-3.jpg')}}");
    background-color: #000;
  }
  </style>
<!-- begin::Body -->

<body class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">


  <!-- begin:: Page -->
  <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
      {{-- <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
       style="background-image: url {{asset('assets/media//bg/bg-3.jpg')}}; "> --}}
        <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">


          @yield('content')


        </div>
      </div>
    </div>
  </div>

  <!-- end:: Page -->


  <!-- begin::Global Config(global config for global JS sciprts) -->
  <script>
    var KTAppOptions = { "colors": { "state": { "brand": "#5d78ff", "light": "#ffffff", "dark": "#282a3c", "primary": "#5867dd", "success": "#34bfa3", "info": "#36a3f7", "warning": "#ffb822", "danger": "#fd3995" }, "base": { "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"], "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"] } } };
  </script>
  <!-- end::Global Config -->

  <!--begin:: Global Mandatory Vendors -->
  <script src="{{asset('assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
  {{-- <script src="{{asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script> --}}
  <script src="{{asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
  {{-- <script src="{{asset('assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script> --}}
  {{-- <script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script> --}}
  {{-- <script src="{{asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script> --}}
  {{-- <script src="{{asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script> --}}
  {{-- <script src="{{asset('assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script> --}}
  <!--end:: Global Mandatory Vendors -->

  <!--begin::Global Theme Bundle(used by all pages) -->

  {{-- <script src="{{asset('assets/js/demo11/scripts.bundle.js')}}" type="text/javascript"></script> --}}
  <!--end::Global Theme Bundle -->


  <!--begin::Page Scripts(used by this page) -->
  <script src="{{asset('assets/js/demo11/pages/login/login-general.js')}}" type="text/javascript"></script>
  <!--end::Page Scripts -->

  @yield('js')
</body>
<!-- end::Body -->

</html>
