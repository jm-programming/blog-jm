<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title','Default') | Panel Administrativo</title>
    <!-- Styles -->
    
    {!! Html::style('css/app.css') !!}
    {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('css/estilos.css') !!}
	{!! Html::style('plugins/sweet_alert/dist/sweetalert.css') !!}
</head>
<body>
 
@include('layouts.partials._nav')
    <!-- Scripts -->

	<section>
		<div class="container">
			@yield('content')
		</div>
	</section>


	
	<script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/sweet_alert/dist/sweetalert.min.js') }}"></script>
	<script src="{{ asset('plugins/js/scripts.js') }}"></script>

</body>
</html>
