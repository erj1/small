<?php

class Category extends Eloquent
{
	public static $rules = array(
		'name' => 'required|min:1|max:255|unique:categories,name'
	);

	public static $messages = array(
		'name.required' => 'The Category Name is required.',
		'name.min'      => 'The Category Name is required to be longer.',
		'name.max'      => 'The Category Name is required to be shorter.',
		'name.unique'   => 'The Category Name is required to be unique.'
	);

	protected $fillable = array('name');

	/**
	 * Posts
	 *
	 * Returns a collection of posts that are within this category
	 *
	 * @return Collection
	 */
	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function getSlugAttribute()
	{
		return preg_replace('/([^a-z0-9])+/', '', strtolower($this->name));
	}
}
