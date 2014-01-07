@section('title')
	Edit Post
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
			<div class="form-group">
				<label for="title">Title&#42;</label>
					{{ Form::text('title', null, array('autocapitalize' => 'on', 'autofocus' => 'true', 'required' => 'required', 'class' => 'form-control', 'id' => 'title')) }}
					<span class="help-block text-danger">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					<label for="content">Content&#42;</label>
					{{ Form::textarea('content', null, array('autocapitalize' => 'on', 'required' => 'required', 'class' => 'form-control', 'id' => 'content')) }}
					<span class="help-block text-danger">{{ $errors->first('content') }}</span>
				</div>
				{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
@stop