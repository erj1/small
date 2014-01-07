@extends('templates.bootstrap3')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{ Form::open(array('route' => 'login', 'role' => 'form')) }}
				<legend>Login</legend>
				<span class="help-block text-danger">{{ $errors->first('auth') }}</span>
				<div class="form-group">
					<label for="email">Email</label>
					{{ Form::text('email', '', array('placeholder' => 'yourhandle@domain.com', 'autocapitalize' => 'off', 'autofocus' => 'true', 'required' => 'required', 'type' => 'email', 'class' => 'form-control', 'id' => 'email')) }}
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					{{ Form::password('password', array('autocapitalize' => 'off', 'required' => 'required', 'type' => 'password', 'class' => 'form-control')) }}
					<span class="text-danger">{{ $errors->first('password') }}</span>
				</div>
				{{ Form::submit('Login', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop