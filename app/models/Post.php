<?php

class Post extends Eloquent {
	
	/**
	 * A 'black-list' of mass assignable attributes.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	public static $rules = array(
		'author'	  => 'required|exists:users,id',
		'title'		  => 'required',
		'content'	  => 'required',
		'category_id' => 'required|integer|exists:categories,id'
	);

	public function getSummary($length = 140)
	{
		// If the content is less than or equal to the length of a summary, return the whole content;
		if(strlen($this->content) <= $length)
			return $this->content;
		// Trim any spaces from the end of the substring of a desired length and add the elipsis.
		return trim(substr($this->content, 0, $length), ' ') . '&hellip;';
	}

	public function author()
	{
		return $this->belongsTo('User', 'author');
	}

	/**
	 * Category
	 *
	 * Provides the category that this post was put within.
	 *
	 * @return Category
	 */
	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function getAuthorName()
	{
		return $this->author()->first()->full_name();
	}

	public function getDates()
	{
		$dates   = parent::getDates();
		$dates[] = 'published_at';
 		return $dates;
	}
}
