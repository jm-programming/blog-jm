@extends('layouts.app')
@section('title','Articulos')

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
    <h3 class="panel-title"><h3 class="text-center">Articulos</h3></h3>
  </div>
  <div class="panel-body">
  
    <table class="table table-responsive">
				
			 {!! Form::open( ['route'=>'articles.index', 'method'=> 'GET', 'class'=>'navbar-form pull-right']) !!}
			 <div class="col-md-12">
		<div class="col-md-4 text-left">
			<h2> <span class="glyphicon glyphicon-th-large"></span> Listado de Articulos</h2>
		</div>	
						<div class="input-group text-center col-md-4">
					 		 {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar Articulo']) !!}
					 		 <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>
						</div>
			<div class="col-md-12">
				<div class="text-right">
					{{ link_to_route('articles.create', $title = '',null, $attributes = ['class'=>'btn btn-info glyphicon glyphicon-plus']) }}<hr>
				</div>
			</div>
			</div>
			{!! Form::close() !!}
			
			





		<div class="col-md-12">
			@include('alerts._success')
		</div>
		<thead>
			<tr>
				<th>ID</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Usuario</th>
				<th>Acción</th>	
				
			</tr>
		</thead>
		<tbody>
		@foreach ($articles as $article)
			<tr>
				<td> {{ $article->id }} </td>
				<td> {{ strtoupper($article->title) }} </td>
				<td>{{ $article->category->name }}</td>
				<td>{{ $article->user->name }}</td>
				
				<td>	
					<a href="{{ route('articles.edit', $article->id) }}" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>	
					<a href="{{ route('admin.articles.destroy', $article->id) }}"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
								
				</td>
			</tr>
		@endforeach
			  
		</tbody>
	</table>
  </div>
  <div class="text-center">
  	{{ $articles->render() }}
  </div>
  <div class="panel-footer">Panel administrativo</div>
</div>
		
	
	</div>
@endsection