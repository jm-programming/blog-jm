@extends('layouts.app')
@section('title','Crear Tag')
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
  <div class="panel-heading">Tags</div>
  <div class="panel-body">
@include('alerts._dangers')
  <h1>Crear nuevo tag</h1>
  <hr>
    {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}

		<div class="form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del tag']) }}
		</div>
		
	
		<div class="form-group">
			{{ Form::submit('Crear tag', ['class'=>'btn btn-primary ']) }}
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
