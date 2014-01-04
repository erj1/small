<?php

class Post extends Eloquent {
	
	/**
	 * A 'black-list' of mass assignable attributes.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	public static $rules = array();

	public function getSummary($length = 140)
	{
		// Trim any spaces from the end of the substring of a desired length and add the elipsis.
		return trim(substr($this->content, 0, $length), ' ') . '&hellip;';
	}

	public function author()
	{
		return $this->belongsTo('User', 'author');
	}

	public function getAuthorName()
	{
		return $this->author()->first()->full_name();
	}
}
