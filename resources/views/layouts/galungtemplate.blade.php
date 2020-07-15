<!DOCTYPE html>

<html lang="en">

<!--begin::Head-->

<head>
  <base href="">
  <meta charset="utf-8" />
  <title>Metronic | Dashboard</title>
  <meta name="description" content="Updates and statistics" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--begin::Fonts-->
  <!-- metronic -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!-- metronic -->
  <link href="{{ asset('css/galung.css') }}" rel="stylesheet" type="text/css" />
  <!-- bootstrap -->
  <link href="{{ asset('css/bootstrap.min.js') }}" rel="stylesheet" type="text/css" />
</head>

<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">

  <nav>
    @include('layouts.navbar')
  </nav>

  <div id="main" style="height: 100%;">
    @yield('content')
  </div>

  <footer>
    @include('layouts.footer')
  </footer>

  <!--begin::Global Config(global config for global JS scripts)-->
  <script>
    var KTAppOptions = {
      "colors": {
        "state": {
          "brand": "#591df1",
          "light": "#ffffff",
          "dark": "#282a3c",
          "primary": "#5867dd",
          "success": "#34bfa3",
          "info": "#36a3f7",
          "warning": "#ffb822",
          "danger": "#fd3995"
        },
        "base": {
          "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
          "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        }
      }
    };
  </script>

  <!-- end::Global Config -->
  <!--begin::Global Theme Bundle(used by all pages) -->
  <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
  <!--begin::Page Vendors(used by this page) -->
  <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
  <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
  <!--end::Page Vendors -->
  <!--begin::Page Scripts(used by this page) -->
  <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
  <!-- metronic -->

  <!--end::Page Scripts-->
</body>

<!--end::Body-->

</html>