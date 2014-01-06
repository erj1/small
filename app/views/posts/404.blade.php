@extends('templates.html5bp')

@section('title')
	Woops!
@stop

@section('content')
	<div class="center-content">
		<h2>Sorry about that!</h2>
		<p>{{ $message or 'We couldn\'t find that!' }}</p>
		<br>
		<a class="button" href="{{ URL::route('posts.index') }}">Return to all posts</a>
	</div>
@stop