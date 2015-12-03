<?php

namespace DonaldNamespace\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
	protected $table = 'users';

	protected $fillable = [
		'Email',
		'User_Name',
		'User_Password',
		'active',
		'active_hash',
		'remember_identifier',
		'remember_token',
		'rating',
		'Last_Login',
		'Date_Updated'
	];
}