@extends('layouts.app')
@section('title', 'Imagenes')
@section('content')

<div class="row">
	@if ($images == null)
		<h1 class="text-center"> <span class="label label-default">No hay Imagenes disponibles</span></h1>
	@else

	@foreach ($images as $image)
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-body panel1">
		    <div>
		    	<img src="imagenes/articles/{{ $image->name }}" class="img-responsive img-rounded imgn">
		    </div>
		  </div>
		  	<div class="panel-footer">{{ $image->article->title }}</div>
		</div>
	</div>
	@endforeach
	@endif
</div>
@endsection

<style type="text/css">
	/*.panel1{
		width: 200px;
		height: 300px;
	}*/
	.imgn{
		width: 300px;
		height: 400px;
		padding: 5px;	
	}

</style>