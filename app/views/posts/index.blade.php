@section('title')
	Posts
@stop

@section('content')
<div class="container">
	
	<div class="row">
		
		<div class="col-sm-3">
			<p>
				<a class="btn btn-primary" href="{{ URL::route('posts.create') }}">New Post</a>
			</p>
		</div>
		
		<div class="col-sm-9">

			{{-- List Posts Here --}}
			@foreach($posts as $post)

				<article>
					<header>
						<a href="{{ URL::route('posts.show', $post->id) }}">
							<h2>{{ $post->title }}</h2>
						</a>
						<p>
							{{ $post->getAuthorName() }} On 
							<small class="summary-date">
								{{ $post->published_at->toFormattedDateString() }}
							</small>
						</p>
					</header>
					<section>
						<p>{{ $post->getSummary(280) }}</p>
					</section>
				</article>
			
			@endforeach

		</div>

	</div>

</div>
@stop