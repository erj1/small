@section('title')
	Posts
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-2 col-sm-offset-10">
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ URL::route('posts.create') }}">New Post</a>
			</div>
		</div>
	</div>
	@foreach($posts as $post)
		<div class="row">
			<div class="col-lg-12">
				<article>
					<header>
						<a href="{{ URL::route('posts.show', $post->id) }}"><h2>{{ $post->title }}</h2></a>
						<h3>{{ $post->getAuthorName() }} <br><small class="summary-date">{{ $post->published_at }}</small></h3>
					</header>
					<section>
						<p>{{ $post->getSummary(280) }}</p>
					</section>
				</article>
			</div>
		</div>
	@endforeach
</div>
@stop