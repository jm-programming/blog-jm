<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> @yield('title','Default') | Panel Administrativo</title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	@include('admin.template.partials.nav')
<section>
	@yield('content')
</section>

	<script src="{{ asset('plugins/js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}" type="text/javascript"></script>
</body>
</html>