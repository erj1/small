<?php

class PostsController extends BaseController {

	/**
   * The layout that should be used for responses.
   */
  protected $layout = 'templates.html5bp';

  /**
   * Instantiate a new UserController instance.
   */
  public function __construct()
  {
  	$this->beforeFilter('auth', array('only' => array('create', 'edit', 'update', 'destroy')));
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return View::make('posts.index');
		$this->layout->content = View::make('posts.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
  	$this->layout->content = View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array(
			'author' 	=> Auth::user()->id,
			'title' 	=> Input::get('title'),
			'content'	=> Input::get('content'),
			);
		$validator = Validator::make($input, Post::$rules);

		if( $validator->fails())
			return Redirect::back()->withErrors($validator);
		
		$now = new DateTime;
		Post::create(array_add(
			$input, 'published_at', $now->format('Y-m-d H:i:s')
			));
		return Redirect::route('posts.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$post->load('author');

    $this->layout->content = View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!$this->validateUserOwnsPost($id)) {
			// If the user is not the author of the current post...
			return Redirect::route('posts.index');
		}
		// Normal logic from here.
		$post = Post::findOrFail($id);
    $this->layout->content = View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!$this->validateUserOwnsPost($id)) {
			// If the user is not the author of the current post...
			return Redirect::route('posts.index');
		}
		// Normal logic from here.
		$input = array(
			'author' 	=> Auth::user()->id,
			'title' 	=> Input::get('title'),
			'content'	=> Input::get('content'),
			);
		$validator = Validator::make($input, Post::$rules);

		if( $validator->fails())
			return Redirect::back()->withErrors($validator);
		
		$post = Post::findOrFail($id);
		$post->title 		= $input['title'];
		$post->content 	= $input['content'];
		$post->save();
		return Redirect::route('posts.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!$this->validateUserOwnsPost($id)) {
			// If the user is not the author of the current post...
			return Redirect::route('posts.index');
		}
		Post::destroy($id);
		return Redirect::route('posts.index');
	}

	/**
	 * Make sure the post is owned by the current user.
	 * http://laravel.com/docs/eloquent#collections
	 * @param int $id
	 * @return bool
	 */
	private function validateUserOwnsPost($id)
	{
		$posts = Auth::user()->posts;
		return $posts->contains($id);
	}

}
