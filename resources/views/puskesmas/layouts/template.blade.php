	<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="{{ app()->getLocale() }}">
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ asset("../../medica/img/core-img/favicon.ico") }} ">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		
		<!-- Site Title -->
		<title>Form Evaluasi Program</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/jquery.DonutWidget.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{ asset('../../creative-agency/css/main.css')}}">
		@include('randomloader')
		</head>
		<body style=" max-width: 100%; overflow-x: hidden;">
			@include('puskesmas.layouts.header')
			@yield('main')
			@include('puskesmas.layouts.footer')
			
			<script src="{{ asset('../../creative-agency/js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{ asset('../../creative-agency/js/vendor/bootstrap.min.js')}}"></script>
			<script src="{{ asset('../../creative-agency/js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{ asset('../../creative-agency/js/parallax.min.js')}}"></script>			
			<script src="{{ asset('../../creative-agency/js/owl.carousel.min.js')}}"></script>			
			<script src="{{ asset('../../creative-agency/js/jquery.sticky.js')}}"></script>
			<script src="{{ asset('../../creative-agency/js/jquery.DonutWidget.min.js')}}"></script>
			<script src="{{ asset('../../creative-agency/js/jquery.magnific-popup.min.js')}}"></script>	
					
			<script src="{{ asset('../../creative-agency/js/main.js')}}"></script>
		</body>
	</html>