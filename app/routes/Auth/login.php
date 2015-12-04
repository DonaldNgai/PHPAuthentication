<?php

$app->get('/login', $guest(), function() use($app) {

	$app->render('Auth/login.php');

})->name('loginPage');

$app->post('/login',$guest(), function() use($app){

	$request = $app->request;

	$identifier = $request->post('identifier');

	$valid = $app->validation;

	$valid->validate([
		'identifier' => [$identifier, 'required'],
		'password' => [$request->post('password'),'required'],
		]);

	if ($valid->passes())
	{
		$user = $app->user
		->where('Username', $identifier)
		->orWhere('Email', $identifier)
		->first();

		if ($user && $app->hash->passwordCheck($request->post('password'), $user->Password)){
			$app->flash('global', 'You are now logged in');
			$_SESSION[$app->config->get('auth.session')] = $user->User_Key;

		}
		else
		{
			$app->flash('global', 'Login Failed');
		}

		$app->response->redirect($app->urlFor('loginPage'));


	}
	else{
		$app->flash('global', 'Please fill in all fields');
		$app->render('Auth/login.php',[
		'request' => $request
		]);
	}
	
		

})->name('login.post');