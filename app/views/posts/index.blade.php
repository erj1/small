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

			{{-- List Categories Here --}}
			<div id="categoryList" class="list-group">

				<a href="#" class="list-group-item active">All</a>
				
				@foreach($categories as $category)

					<a href="{{ URL::action(
						'PostsController@category', array(
							'category_id' => $category->id,
							'category_slug' => $category->slug
						)
					) }}" class="list-group-item">
						<span class="badge">{{ $category->posts->count() }}</span>
						{{{ $category->name }}}
					</a>
				@endforeach
			</div>
		</div>
		
		<div class="col-sm-9">

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

		</div>

	</div>

</div>
@stop