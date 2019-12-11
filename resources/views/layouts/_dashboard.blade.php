<!doctype html>
<html lang="en">

<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('dash/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('dash/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('dash/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('dash/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('dash/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('dash/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('dash/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('dash/assets/img/favicon.png')}}">
  <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
  <!-- Page-Level Plugin CSS - Dashboard -->
  <link href="{{asset('admin/assets/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/css/plugins/timeline/timeline.css')}}" rel="stylesheet">
  <!-- SB Admin CSS - Include with every page -->
  <link href="{{asset('admin/assets/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script src="{{asset('admin/assets/js/jquery-1.10.2.js')}}"></script>
  <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
  <!-- Page-Level Plugin Scripts - Dashboard -->
  <script src="{{asset('admin/assets/js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/morris/morris.js')}}"></script>
  <!-- SB Admin Scripts - Include with every page -->
  <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>
  <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
  <script src="{{asset('admin/assets/js/demo/dashboard-demo.js')}}"></script>
  <!-- Page-Level Plugin Scripts - Tables -->
  <script src="{{asset('admin/assets/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
  <!-- SB Admin Scripts - Include with every page -->
  <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
  {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}
  @yield('header')

</head>
<style>
body #page-wrapper{
  background-color: slategray;
  background-size: 100%;
  /* width:100%; */
  /* height:500%; */
  /* background-position-x: 10%; */
}
</style>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
    {{-- @yield('dashboard') --}}
    @include('layouts.includes._navbar')
    @include('layouts.includes._sidebar')
  
    <div id="page-wrapper">
        @yield('dashboard')
    </div>

		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('dash/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('dash/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('dash/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('dash/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('dash/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('dash/assets/scripts/klorofil-common.js')}}"></script>

	<script src="{{asset('admin/assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="{{asset('admin/assets/js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/morris/morris.js')}}"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="{{asset('admin/assets/js/demo/dashboard-demo.js')}}"></script>
    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="{{asset('admin/assets/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{asset('admin/assets/js/sb-admin.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    {{-- <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>  --}}
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> --}}

    @yield('footer')
	
</body>
</html>
