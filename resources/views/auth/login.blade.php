@extends('admin.template.main')
@section('title','Login')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<!-- resources/views/auth/login.blade.php -->

<div class="col-md-6">
	<div class="container">
	{!! Form::open(['route'=>'auth.login', 'method' => 'POST'])!!}
		
    {!! csrf_field() !!}

    <div>
        Correo Electronico
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div>
        Contraseña
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div>
        <input type="checkbox" name="remember" class=""> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

{!! Form::close()!!}
	</div>
</div>

@endsection