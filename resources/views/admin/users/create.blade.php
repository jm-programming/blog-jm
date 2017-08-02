@extends('admin.template.main')

@section('title','Crear Usuario')

@section('content')

	{!! Form::open(['route' => 'users.store', 'method'=>'POST']) !!}

		<div class="form-group">
				{{ Form::label('name', 'Nombre') }}
				{{ Form::submit('Click Me!', ['class'=>'btn btn-primary']) }}
			

		</div>
	{!! Form::close() !!}
@endsection