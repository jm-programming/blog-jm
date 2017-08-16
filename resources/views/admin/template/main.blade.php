<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> @yield('title','Default') | Panel Administrativo</title>
	
	{!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('css/estilos.css') !!}
	{!! Html::style('plugins/sweet_alert/dist/sweetalert.css') !!}

</head>
<body>
	@include('admin.template.partials.nav')
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