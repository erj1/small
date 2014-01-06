<?php

class Post extends Eloquent {
	
	/**
	 * A 'black-list' of mass assignable attributes.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	public static $rules = array(
		'author'	=> 'required|exists:users,id',
		'title'		=> 'required',
		'content'	=> 'required',
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

	public function getAuthorName()
	{
		return $this->author()->first()->full_name();
	}
}
