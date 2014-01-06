@section('title')
	New Post
@stop

@section('content')
	{{ Form::open(array('route' => 'posts.store')) }}
	<label>
		<div>Title&#42;<span class="error-message">{{ $errors->first('title') }}</span></div>
		{{ Form::text('title') }}
	</label>
	<label>
		<div>Content&#42;<span class="error-message">{{ $errors->first('content') }}</span></div>
		{{ Form::textarea('content') }}
	</label>
	<br>
		{{ Form::submit('Create', array('class' => 'button')) }}
	{{ Form::close() }}
@stop