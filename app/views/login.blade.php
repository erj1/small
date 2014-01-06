@extends('templates.html5bp')

@section('content')
	{{ Form::open(array('route' => 'login')) }}
		<div><span class="error-message">{{ $errors->first('auth') }}</span></div>
		<label>
			<div>Email <span class="error-message">{{ $errors->first('email') }}</span></div>
			{{ Form::text('email', '', array('placeholder' => 'yourhandle@domain.com', 'autocapitalize' => 'off', 'autofocus' => 'true', 'required' => 'required', 'type' => 'email')) }}
		</label>
		<label>
			<div>Password <span class="error-message">{{ $errors->first('password') }}</span></div>
			{{ Form::password('password', '', array( 'autocapitalize' => 'off', 'type' => 'password', 'required' => 'required')) }}
		</label>
		{{ Form::submit('Login', array('class' => 'button')) }}
	{{ Form::close() }}
@stop