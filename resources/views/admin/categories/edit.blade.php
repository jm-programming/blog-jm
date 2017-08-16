@extends('layouts.app')

@section('title','Editar Categoria')

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
	
	<div class="row">
    <div class="container text-aling">
            <div class="panel panel-info">
  <div class="panel-heading">Categoria</div>
  <div class="panel-body">
  @include('alerts._dangers')
  <h1>Editar Categoria {{$category->name}}</h1>
  <hr>
    {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'PUT']) !!}
    	

		<div class="form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::text('name', $category->name , ['class'=>'form-control', 'placeholder'=>'Ingresa tu nombre']) }}
		</div>
		
	
		<div class="form-group">
			{{ Form::submit('Editar Categoria', ['class'=>'btn btn-primary ']) }}
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