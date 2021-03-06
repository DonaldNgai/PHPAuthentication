<?php
$app->get('/register',$guest(), function() use($app){
	
	$app->render('/Auth/register.php');

})->name('registerPage');

$app->post('/register',$guest(), function() use ($app){

	$request = $app->request;

	$email = $request->post('email');
	$username = $request->post('username');
	$password = $request->post('password');
	$passwordConfirm = $request->post('password_confirm');

	$valid = $app->validation;

	$valid->validate([
		'email' => [$email, 'required|email|uniqueEmail'],
		'username' => [$username,'required|alnumDash|max(20)|uniqueUsername'],
		'password' => [$password,'required|min(6)'],
		'password_confirm' => [$passwordConfirm,'required|matches(password)']
		]);

	if($valid->passes()){
		$user = $app->user->create([
		'Email' => $email,
		'Username' => $username,
		'Password' => $app->hash->password($password)
		]);

		$app->mail->send('Auth/Email/registered.php',['user' => $user], function($message) use($user){
			$message->to($user->Email);
			$message->subject('Thanks for registering.');
		});

		$app->flash('global', 'You have been registered.');
		$app->response->redirect($app->urlFor('homepage'));
	}
	

	$app->render('Auth/register.php',[
		'errors' => $valid->errors(),
		'request' => $request,
		]);
	

})->name('register.post');