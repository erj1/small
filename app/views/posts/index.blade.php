@section('title')
	Posts
@stop

@section('content')
	{{ Post::all() }}
@stop