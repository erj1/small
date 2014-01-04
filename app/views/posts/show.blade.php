@section('content')
	<article>
		<header>
			<h2>{{ $post->title }}</h2>
			<h3 class="lighter">{{ $post->getAuthorName() }} on {{ $post->published_at }}</h3>
		</header>
		<section>
			<p>{{ $post->content }}</p>
		</section>
		<footer>
			<a href="{{ URL::route('posts.index') }}">return to posts</a>
		</footer>
	</article>
@stop