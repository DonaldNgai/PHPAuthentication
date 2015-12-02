<?php

$app->get('/user/:userName',function($userName) use($app){

	$users = $app->db->prepare("
		select * from users
		where User_Name = :userName;
		");

	$users->execute(['userName' => $userName]);

	$users = $users->fetchAll(PDO::FETCH_ASSOC);

	if (!$users){
		$app->notFound();
	}

	var_dump($users);
	die();
	//Referes to the views folder
	$app->render('user.php',[
		'users' => $users
		]);



})->name('userPage');

?>