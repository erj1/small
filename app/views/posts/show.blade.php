@section('content')
	@if(Auth::check() and Auth::user()->id === $post->author)
		<div class="hang-right">
			{{ Form::open(array('route' => array('posts.destroy', $post->id), 'method' => 'DELETE')) }}
				<a class="button" href="{{ URL::route('posts.edit', $post->id) }}">Edit Post</a>
				{{ Form::submit('Delete Post', array('class' => 'button danger link', 'title' => 'Here be dragons!')) }}
			{{ Form::close() }}
		</div>
	@endif
	<article>
		<header>
			<h2>{{ $post->title }}</h2>
			<h3 class="lighter">{{ $post->getAuthorName() }} on {{ $post->published_at }}</h3>
		</header>
		<section>
			<p>{{ $post->content }}</p>
		</section>
		<footer class="hang-right">
			<a class="button" href="{{ URL::route('posts.index') }}">return to posts</a>
		</footer>
	</article>
@stop