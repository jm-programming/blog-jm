@extends('layouts.app')
@section('title','Crear articulos')

@section('content')
<br>

<div class="container">
	
	<div class="row">
    <div class="container text-aling">
  <div class="panel panel-info">
  <div class="panel-heading"><h3 class="text-center">Articulos</h3></div>
  <div class="panel-body">
@include('alerts._dangers')
  <h1>Crear nuevo articulo</h1>
  <hr>
	{!! Form::open(['route'=>'articles.store', 'method'=>'POST', 'files' => true]) !!}
	{{ csrf_field() }}
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Titulo del articulo']) !!}
		</div>
		

		<div class="form-group">
            {!! Form::label('category_id', 'Categoria') !!}
           
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control category_chosen' , 'placeholder'=>'Seleccione una categoria']) !!}
        </div>

		<div class="form-group">
			{!! Form::label('content', 'Contenido') !!}
			{!! Form::textarea('content', null, ['class'=>'form-control content_trumbowyg']) !!}
		</div>

		<div class="form-group">
            {!! Form::label('tags', 'Tag') !!}
            {!! Form::select('tags', $tags, null, ['class'=>'form-control chosen_tag' , 'multiple']) !!}
        </div>
		
		<div class="form-group">
			{!! Form::label('image','Imagen') !!}
			{!! Form::file('image', null, "{{ old() }}", ['class'=>'form-control']) !!}
		</div>
        <div class="form-group">
        	<button class="btn btn-primary">Crear articulo</button>
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

@section('script')

<script>
	$(".chosen_tag").chosen({
		placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
		max_selected_options: 3,
		no_results_text: 'No se encontro tags',

	});

	$('.category_chosen').chosen({
		no_results_text: 'No se encontro categoria',
	});

	$('.content_trumbowyg').trumbowyg();
</script>

@endsection