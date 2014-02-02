@section('title')
	{{{ $category->name }}} Posts
@stop

@section('content')
<div class="container">
	
	<div class="row">
		
		<div class="col-sm-3">


			<p>
				<a class="btn btn-primary" href="{{ URL::route('posts.create') }}">New Post</a>
			</p>

			{{-- List Categories Here --}}
			<div id="categoryList" class="list-group">

				<a href="{{ url('posts') }}" class="list-group-item">All</a>
				
				@foreach($categories as $c)

					@if ($c->id === $category->id)

					<a href="#" class="list-group-item active">

					@else

					<a href="{{ URL::action(
						'PostsController@category', array(
							'category_id' => $c->id,
							'category_slug' => $c->slug
						)
					) }}" class="list-group-item">

					@endif
						<span class="badge">{{ $c->posts->count() }}</span>
						{{{ $c->name }}}
					</a>
				@endforeach
			</div>
		</div>
		
		<div class="col-sm-9">

		@if ($posts->count() > 0)

			{{-- List Posts Here --}}
			@foreach($posts as $post)

				<article>
					<header>
						<a href="{{ URL::route('posts.show', $post->id) }}">
							<h2>{{ $post->title }}</h2>
						</a>
						<h3>
							{{ $post->getAuthorName() }} <br>
							<small class="summary-date">
								{{ $post->published_at->toFormattedDateString() }}
							</small>
						</h3>
					</header>
					<section>
						<p>{{ $post->getSummary(280) }}</p>
					</section>
				</article>
			
			@endforeach

		@else

			<div class="alert alert-info">
				<strong>No Posts Available</strong>
				<p>Oops! We&apos;re sorry but we don't have any posts within this category.</p>
				<p>Please select another category.</p>
			</div>

		@endif
		</div>

	</div>

</div>
@stop