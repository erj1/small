@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if(Auth::check() and Auth::user()->id === $post->author)
				<div class="pull-right">
					{{ Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'DELETE')) }}
						<a class="btn btn-primary" href="{{ URL::route('posts.edit', $post->id) }}">Edit Post</a>
						{{ Form::submit('Delete Post', array('class' => 'btn btn-danger', 'title' => 'Here be dragons!')) }}
					{{ Form::close() }}
				</div>
			@endif
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<article>
				<header>
					<h2>{{ $post->title }}</h2>
					<h3 class="lighter">{{ $post->getAuthorName() }} on {{ $post->published_at }}</h3>
				</header>
				<section>
					<p>{{ $post->content }}</p>
				</section>
				<footer class="hang-right">
					<a class="btn btn-info" href="{{ URL::route('posts.index') }}">Return to Posts</a>
				</footer>
			</article>
		</div>
	</div>
</div>
@stop