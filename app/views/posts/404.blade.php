@extends('templates.bootstrap3')

@section('title')
	<div class="text-center" style="font-size:2.4em">Woops!</div>
	<div class="row">
		<div class=""
	</div>
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h2>Sorry about that!</h2>
			<p>{{ $message or 'We couldn\'t find that!' }}</p>
			<br>
			<a class="btn btn-info" href="{{ URL::route('posts.index') }}">Return to all posts</a>
		</div>
	</div>
</div>
@stop