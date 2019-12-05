<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Sekolah</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    {{-- <link href="{{asset('admin/assets/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('admin/assets/css/plugins/timeline/timeline.css')}}" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{asset('admin/assets/css/sb-admin.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> --}}

  
    

</head>

<body>

    <div id="wrapper">

       @include('layouts.includes._navbar')
        @include('layouts.includes._sidebar')
            
        

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{asset('admin/assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{asset('admin/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script> --}}

    <!-- Page-Level Plugin Scripts - Dashboard -->
    {{-- <script src="{{asset('admin/assets/js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/morris/morris.js')}}"></script> --}}

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="{{asset('admin/assets/js/demo/dashboard-demo.js')}}"></script>

  

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="{{asset('admin/assets/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>

    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> --}}
    

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>