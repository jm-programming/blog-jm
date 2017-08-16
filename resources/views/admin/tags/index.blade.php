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
    <h3 class="panel-title">Tags</h3>
  </div>

 

  <div class="panel-body">
  
    <table class="table table-responsive">

		<h1> <span class="glyphicon glyphicon-list-alt"></span> Listado de Tags</h1>
		@include('alerts._success')
		<div class="text-right">
			{{ link_to_route('tags.create', $title = '',null, $attributes = ['class'=>'btn btn-info glyphicon glyphicon-plus']) }}<hr>
		</div>

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