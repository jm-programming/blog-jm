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
			{!! Form::text('title', $articles->title, ['class'=>'form-control', 'placeholder'=>'Titulo del articulo']) !!}
		</div>
		

		<div class="form-group">
            {!! Form::label('category_id', 'Categoria') !!}
            {!! Form::select('category_id', $categories, $categories ,['class' => 'form-control category_chosen' , 'placeholder' => 'Seleccione una categoria'] ) !!}
        </div>

		<div class="form-group">
			{!! Form::label('content', 'Contenido') !!}
			{!! Form::textarea('content', $articles->content, ['class'=>'form-control content_trumbowyg']) !!}
		</div>

		<div class="form-group">
            {!! Form::label('tags', 'Tag') !!}
            {!! Form::select('tags[]', $tags, $my_tags, ['class'=>'form-control chosen-tag', 'multiple']) !!}
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

@section('script')

<script>
	$(".chosen-tag").chosen({
		placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
		max_selected_options: 3,
		no_results_text: 'No se encontro tags',

	});

	$('.category_chosen').chosen({
		no_results_text: 'No se encontro tags',
		placeholder_text_multiple: 'Seleccione una categoria'
	});

	$('.content_trumbowyg').trumbowyg({
		
	});
</script>

@endsection