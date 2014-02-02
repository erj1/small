<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

App::error(function(ModelNotFoundException $e)
{
	if(!stristr($e->getMessage(), 'post' ) === FALSE) {
		// return "Not Found.";
		return Response::view('posts.404', array('message' => 'This post doesn\'t seem to exist.'), 404);
	}
	return App::abort(404);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('home');
}));

Route::get('login', array('as' => 'login', function()
{
	if(Input::has('errors'))
		return View::make('login')->with('errors', Input::get('errors'));
	return View::make('login');
}));

Route::post('login', function()
{
	$input = array(
		'email' 		=> Input::get('email'),
		'password'	=> Input::get('password'),
		);
	$validator = Validator::make($input, User::$loginRules);
	if($validator->fails())
		return View::make('login')->withErrors($validator);
	// Normal login from here.
	if(Auth::attempt(array('email' => $input['email'], 'password'	=> $input['password']), true)) {
		return Redirect::intended('posts');
	}
	else {
		$validator->messages()->add('auth', 'These credentials are invalid. Please try again.');
		return View::make('login')->withErrors($validator);
	}
});

Route::get('logout', array('as' => 'logout', function()
{
	Auth::logout();
	return Redirect::route('home');
}));

Route::resource('posts', 'PostsController');

/*
 * ============================================================================
 * Category Routes
 * ============================================================================
 */

// Show posts for a specific category
Route::get('posts/category/{category_id}/{category_slug?}',
	'PostsController@category');

// Category Resource Route (Admin)
Route::resource('category', 'CategoryController',
	array('only' => array('store')));