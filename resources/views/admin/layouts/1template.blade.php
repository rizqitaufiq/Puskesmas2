<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="{{ app()->getLocale() }}">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ asset("../../medica/img/core-img/favicon.ico") }}">
    <link rel="shortcut icon" href="{{ asset("../../medica/img/core-img/favicon.ico") }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('../../ela/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('../../ela/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('../../ela/assets/css/style.css')}}">
</head>

<body>
    @include('admin.layouts.1sidebar')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('admin.layouts.1header')
        @yield('konten')
        @include('admin.layouts.1footer')
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('../../ela/assets/js/main.js')}}"></script>

    <script src="{{ asset('../../ela/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('../../ela/assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
</body>
</html>
