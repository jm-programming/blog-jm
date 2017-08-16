@extends('layouts.app')

@section('title','Crear Usuario')

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
  <div class="panel-heading">Usuario</div>
  <div class="panel-body">
@include('alerts._dangers')
  <h1>Crear nuevo Usuario</h1>
  <hr>
    {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}

		<div class="form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa tu nombre']) }}
		</div>
		<div class="form-group">
				{{ Form::label('email', 'Correo') }}
				{{ Form::email('email', null,['class'=>'form-control', 'placeholder'=>'Ingresa un correo electronico'])}}
		</div>
		<div class="form-group">
				{{ Form::label('password', 'Contraseña') }}
				{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'***********************']) }}
		</div>
		

		<div class="form-group">
				{{ Form::label('type', 'Tipo') }}
				{{ Form::select('type',['member' => 'Miembro', 'admin' => 'Administrador'],null, ['class'=>'form-control']) }}
		</div>
	
		<div class="form-group">
			{{ Form::submit('Crear Usuario', ['class'=>'btn btn-primary ']) }}
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