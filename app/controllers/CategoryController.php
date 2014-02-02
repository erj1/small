<?php

class CategoryController extends BaseController
{
	public function __construct()
    {
        $this->beforeFilter('auth', array(
        	'only' => array('store')
        ));
    }

	/**
	 * Store
	 *
	 * Validates and then saves a category into the database.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(array('name'));
		$validator = Validator::make($input, Category::$rules, Category::$messages);

		if ($validator->fails()) {
			return App::abort(500, $validator->messages()->first('name'));
		}

		$category = Category::create(array(
			'name' => Input::get('name')
		));

		return Response::json(array(
			'id'   => $category->id,
			'name' => $category->name
		));
	}
}
