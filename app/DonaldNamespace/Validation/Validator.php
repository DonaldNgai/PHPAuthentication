<?php

namespace DonaldNamespace\Validation;

use Violin\Violin;
use DonaldNamespace\User\User;


class Validator extends Violin{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;

		$this->addFieldMessages([
				'email' => [
					'uniqueEmail' => 'Email is already in use',
				],
				'username' =>[
					'uniqueUsername' => 'Username already in use',
				]
			]);
	}

	public function validate_uniqueEmail($value, $input, $args){

		$user = $this->user->where('Email', $value);

		return ! (bool) $user->count();
	}

	public function validate_uniqueUsername($value, $input, $args){

		return ! (bool) $this->user->where('Username', $value)->count();

	}
}