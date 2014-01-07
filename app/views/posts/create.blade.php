@section('title')
	New Post
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(array('route' => 'posts.store')) }}
				<div class="form-group">
					<label for="title">Title&#42;</label>
					{{ Form::text('title', '', array('autocapitalize' => 'on', 'autofocus' => 'autofocus', 'required' => 'required', 'class' => 'form-control', 'id' => 'title')) }}
				<span class="help-block text-danger">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					<label for="content">Content&#42;</label>
					{{ Form::textarea('content', '', array('autocapitalize' => 'on', 'required' => 'required', 'class' => 'form-control', 'id' => 'content')) }}
					<span class="help-block text-danger">{{ $errors->first('content') }}</span>
				</div>
				{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop