@extends('layouts.app')
@section('title', 'Imagenes')
@section('content')

<div class="row">
	@foreach ($images as $image)
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="panel panel-default">
		  <div class="panel-body">
		    <img src="imagenes/articles/{{ $image->name }}" class="img-responsive" width="500px" height="200px">
		  </div>
		  	<div class="panel-footer">{{ $image->article->title }}</div>
		</div>
	</div>
	@endforeach
</div>
@endsection