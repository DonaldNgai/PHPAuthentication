<?php

namespace DonaldNamespace\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
	protected $table = 'Users';

	protected $fillable = [
		'Email',
		'Username',
		'Password',
		'active',
		'active_hash',
		'remember_identifier',
		'remember_token',
		'Rating',
		'Last_Login',
		'Date_Updated'
	];
}