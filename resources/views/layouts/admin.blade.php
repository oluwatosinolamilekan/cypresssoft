<!DOCTYPE html>
<html lang="en" dir="ltr">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Cypress</title>
      <!-- GOOGLE FONTS -->
      <link href="{{asset('fonts.googleapis.com/cssbf7a?family=Karla:400,700|Roboto')}}" rel="stylesheet">
      <link href="{{asset('assets/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
      <!-- PLUGINS CSS STYLE -->
      <link href="{{asset('assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
      <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
      <link href="{{asset('cdn.quilljs.com/1.3.6/quill.snow.css')}}" rel="stylesheet">
      <link href="{{asset('assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
      <!-- MONO CSS -->
      <link  rel="stylesheet" href="{{asset('assets/css/mono.css')}}" />
      <!-- CSS for Demo -->
      <link rel="stylesheet" href="{{asset('assets/options/optionswitch.css')}}" />
      <!-- FAVICON -->
      <link href="https://www.cypressoft.com/favicon.ico" rel="shortcut icon" />
      <script src="{{asset('assets/plugins/nprogress/nprogress.js')}}"></script>
   </head>
   <body class="navbar-fixed sidebar-fixed" id="body">
      <script>
         NProgress.configure({ showSpinner: false });
         NProgress.start();
      </script>
      <div id="toaster"></div>
      <!-- ====================================
         ——— WRAPPER
         ===================================== -->
      <div class="wrapper">
         <!-- ====================================
            ——— LEFT SIDEBAR WITH OUT FOOTER
            ===================================== -->
         @include('layouts.sidebar')
         <!-- ====================================
            ——— PAGE WRAPPER
            ===================================== -->
         <div class="page-wrapper">
            <!-- Header -->
            @include('layouts.header')
            <!-- ====================================
               ——— CONTENT WRAPPER
               ===================================== -->
            @yield('content')
            {{-- @include('error') --}}
            <!-- Footer -->
            @include('layouts.footer')
         </div>
      </div>
      <!-- Card Offcanvas -->

      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/plugins/simplebar/simplebar.min.js')}}"></script>
      <script src="{{asset('unpkg.com/hotkeys-js%403.8.1/dist/hotkeys.min.js')}}"></script>
      <script src="{{asset('assets/plugins/apexcharts/apexcharts.js')}}"></script>
      <script src="{{asset('assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
      <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
      <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
      <script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
      <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <script>
         jQuery(document).ready(function() {
           jQuery('input[name="dateRange"]').daterangepicker({
           autoUpdateInput: false,
           singleDatePicker: true,
           locale: {
             cancelLabel: 'Clear'
           }
         });
           jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
             jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
           });
           jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
             jQuery(this).val('');
           });
         });
      </script>
      <script src="{{asset('cdn.quilljs.com/1.3.6/quill.js')}}"></script>
      <script src="{{asset('assets/plugins/toaster/toastr.min.js')}}"></script>
      <script src="{{asset('assets/js/mono.js')}}"></script>
      <script src="{{asset('assets/js/chart.js')}}"></script>
      <script src="{{asset('assets/js/map.js')}}"></script>
      {{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}}
      <script>
        toastr.options.preventDuplicates = true;

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif
      </script>
   </body>
</html>
