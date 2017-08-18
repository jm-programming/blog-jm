@extends('layouts.app')

@section('title','Editar Usuario')

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
  <div class="panel-heading"><h3 class="text-center">Usuario</h3></div>
  <div class="panel-body">
  @include('alerts._dangers')
  <h1>Editar Usuario {{$user->name}}</h1>
  <hr>
    {!! Form::open(['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
    	{{ csrf_field() }}

		<div class="form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::text('name', $user->name , ['class'=>'form-control', 'placeholder'=>'Ingresa tu nombre']) }}
		</div>
		<div class="form-group">
				{{ Form::label('email', 'Correo') }}
				{{ Form::email('email',$user->email, ['class'=>'form-control', 'placeholder'=>'Ingresa un correo electronico'])}}
		</div>
		
		<div class="form-group">
				{{ Form::label('type', 'Tipo') }}
				{{ Form::select('type',['member' => 'Miembro', 'admin' => 'Administrador'],$user->type, ['class'=>'form-control']) }}
		</div>
	
		<div class="form-group">
			{{ Form::submit('Editar Usuario', ['class'=>'btn btn-primary ']) }}
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