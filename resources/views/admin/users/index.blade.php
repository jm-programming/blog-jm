@extends('layouts.app')

@section('title','Usuarios')

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
    <h3 class="panel-title"><h3 class="text-center">Usuarios</h3></h3>
  </div>

 

  <div class="panel-body">
  
    <table class="table table-responsive">

		<h1> <span class="glyphicon glyphicon-user"></span> Listado de usuarios</h1>
		@include('alerts._success')
		<div class="text-right">
			{{ link_to_route('users.create', $title = '',null, $attributes = ['class'=>'btn btn-info glyphicon glyphicon-plus']) }}<hr>
		</div>

		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Tipo</th>
				<th>Acción</th>	
				
			</tr>
		</thead>
		<tbody>
		@foreach ($users as $user)
			<tr>
				<th scope="row"> {{ $user->id }} </th>
				<td> {{ strtoupper($user->name) }} </td>
				<td> {{ strtoupper($user->email) }} </td>
				@if($user->type == "admin")
				<td> <span class="label label-danger">{{$user->type}}</span></td>
				@else
				<td> <span class="label label-info">{{ $user->type }}</span></td>
				@endif
				<td>	
			<a href="{{ route('users.edit', $user->id) }}" type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>	
			<a href="{{ route('admin.users.destroy', $user->id) }}"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
								
			</td>
			</tr>
		@endforeach
			  
		</tbody>
	</table>
  </div>
  <div class="text-center">
  	{{ $users->render() }}
  </div>
  <div class="panel-footer">Panel administrativo</div>
</div>
		
	
	</div>
@endsection

