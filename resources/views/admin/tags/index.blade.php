@extends('layouts.app')
@section('title','Tags')

@section('content')

<br>
<br>
<br>
<br>
<br>
<br>

	<div class="container">
		<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title"><h3 class="text-center">Tags</h3></h3>
  </div>

 

  <div class="panel-body">
 
    <table class="table table-responsive">

		<div class="col-md-12">
				<div class="col-md-4">
					<h1><span class="glyphicon glyphicon-tags"></span> Listado de Tags</h1>
				</div>
			 {!! Form::open( ['route'=>'tags.index', 'method'=> 'GET', 'class'=>'navbar-form pull-right']) !!}
					<div class="col-md-4">
						<div class="input-group">
					 		 {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar Tag']) !!}
					 		 <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>
						</div>
					</div>		
			{!! Form::close() !!}
			<div class="col-md-4">
				<div class="text-right">
					{{ link_to_route('tags.create', $title = '',null, $attributes = ['class'=>'btn btn-info glyphicon glyphicon-plus']) }}
				</div>
			</div>

		</div>	
		<div class="col-md-12">
			@include('alerts._success')
		</div>
		
<hr>
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Acción</th>	
				
			</tr>
		</thead>
		<tbody>
		@foreach ($tags as $tag)
			<tr>
				<th scope="row"> {{ $tag->id }} </th>
				<td> {{ strtoupper($tag->name) }} </td>
				
				<td>	
					<a href="{{ route('tags.edit', $tag->id) }}" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>	
					<a href="{{ route('admin.tags.destroy', $tag->id) }}"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
								
				</td>
			</tr>
		@endforeach
			  
		</tbody>
	</table>
  </div>
  <div class="text-center">
  	{{ $tags->render() }}
  </div>
  <div class="panel-footer">Panel administrativo</div>
</div>
		
	
	</div>
@endsection