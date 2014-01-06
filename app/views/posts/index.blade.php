@section('title')
	Posts
@stop

@section('content')
	<div class="hang-right">
		<a class="button" href="{{ URL::route('posts.create') }}">New Post</a>
	</div>
	@foreach(Post::with('author')->orderBy('published_at', 'desc')->get() as $post)
		<article>
			<header>
				<a href="{{ URL::route('posts.show', $post->id) }}"><h2>{{ $post->title }}</h2></a>
				<h3>{{ $post->getAuthorName() }} <br><small class="summary-date">{{ $post->published_at }}</small></h3>
			</header>
			<section>
				<p>{{ $post->getSummary(280) }}</p>
			</section>
		</article>
	@endforeach
@stop