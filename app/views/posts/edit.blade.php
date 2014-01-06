@section('title')
	Edit Post
@stop

@section('content')
	{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
	<label>
		<div>Title&#42;<span class="error-message">{{ $errors->first('title') }}</span></div>
		{{ Form::text('title') }}
	</label>
	<label>
		<div>Content&#42;<span class="error-message">{{ $errors->first('content') }}</span></div>
		{{ Form::textarea('content') }}
	</label>
	<br>
		{{ Form::submit('Update', array('class' => 'button')) }}
	{{ Form::close() }}
@stop