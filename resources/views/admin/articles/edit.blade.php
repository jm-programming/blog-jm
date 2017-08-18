@extends('layouts.app')
@section('title','Editar articulo')

@section('content')
<br>

<div class="container">
	
	<div class="row">
    <div class="container text-aling">
  <div class="panel panel-info">
  <div class="panel-heading"><h3 class="text-center">Articulo</h3></div>
  <div class="panel-body">
@include('alerts._dangers')
  <h1>Editar articulo</h1>
  <hr>
	{!! Form::open(['route'=> ['articles.update', $articles->id ], 'method'=>'PUT', 'files' => true]) !!}
	{{ csrf_field() }}
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Titulo del articulo']) !!}
		</div>
		

		<div class="form-group">
            {!! Form::label('category_id', 'Categoria') !!}
            <select  name="category_id" class="form-control">
	            <option disabled selected value> -- Seleccione una opción -- </option>
	            	@foreach($categories as $categor)
	            	<option value="{{$categor->id}}"> {{ $categor->name }}</option>  
	              	@endforeach
            </select>
        </div>

		<div class="form-group">
			{!! Form::label('content', 'Contenido') !!}
			{!! Form::textarea('content', $articles->content, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
            {!! Form::label('tags', 'Tag') !!}
            <select  name="tags[]" class="form-control" multiple="">
	            
	            	@foreach($tags as $tag)
	            	<option value="{{ $tag->id }}"> {{ $tag->name }}</option>  
	              	@endforeach
            </select>
        </div>
		
		<div class="form-group">
			{!! Form::label('image','Imagen') !!}
			{!! Form::file('image', null, ['class'=>'form-control']) !!}
		</div>
        <div class="form-group">
        	<button class="btn btn-primary">Editar articulo</button>
        </div>

	{!! Form::close() !!}
   <hr>
  </div>
  <div class="panel-footer">Todos los derechos reservados</div>
</div>
    </div>
    
</div>
</div>
@endsection