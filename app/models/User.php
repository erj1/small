<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * A 'black-list' of mass assignable attributes.
	 *
	 * @var array
	 */
	protected $guarded = array('id', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Login rules for a user.
	 *
	 * @var array
	 */
	public static $loginRules = array(
		'email'			=> 'required|email',
		'password'	=> 'required|min:7',
		);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function full_name()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function posts()
	{
		return $this->hasMany('Post', 'author');
	}

}