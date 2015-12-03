<?php

return [
	'app' => [
		'url' => 'http://localhost',
			'hash' => [
				'algo' => PASSWORD_BCRYPT,
				'cost' => 10
				]
			],
	'db' => [
		'driver' => 'mysql',
		'host' => 'localhost',
		'name' => 'Shareables',
		'username' => 'root',
		'password' => 'root',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => ''
	],
	'auth' => [
		'session' => 'user_id',
		'remember' => 'user_remember'
	],
	'mail' => [
		'smtp_auth' => true,
		'smtp_secure' => 'tls',
		'host' => 'smtp.gmail.com',
		'username' => 'transmution@gmail.com',
		'password' => '',
		'port' => 587,
		'html' => true
	],
	'twig' => [
		'debug' => true
	],
	'csrf' => [
		'session' => 'csrf_token'
	]
];

?>