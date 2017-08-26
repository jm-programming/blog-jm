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
    {!! Html::style('plugins/bootstrap/fonts/glyphicons-halflings-regular.svg') !!}
    {!! Html::style('plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('css/estilos.css') !!}
	{!! Html::style('plugins/sweet_alert/dist/sweetalert.css') !!}
	{!! Html::style('plugins/estilos/chosen.min.css') !!}
	{!! Html::style('plugins/trumbowyg/ui/trumbowyg.min.css') !!}
	{!! Html::style('plugins/Full_Calendar/styles/fullcalendar.css') !!}
	{!! Html::style('plugins/Full_Calendar/styles/fullcalendar.print.min.css', ['media'=>'print']) !!}

	<!--Scripts-->
	<script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/Full_Calendar/js/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/Full_Calendar/js/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/sweet_alert/dist/sweetalert.min.js') }}"></script>
	<script src="{{ asset('plugins/js/scripts.js') }}"></script>
	<script src="{{ asset('plugins/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
	
	@yield('styles')
	@yield('scriptss')
<script>
	$(document).ready(function(){
		
		$('.eliminar').click(function(evento){
				swal({
				  title: "Are you sure?",
				  text: "You will not be able to recover this imaginary file!",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Yes, delete it!",
				  closeOnConfirm: false
				},
				function(){
				  swal("Deleted!", "Your imaginary file has been deleted.", "success");
				});
		})

	});
</script>
</head>
<body>

 <section>
	 	@include('layouts.partials._nav')
 </section>	

<section>
	<div class="container">
		@yield('content')
	</div>
</section>
</body>
</html>
