<?php

$app->get('/', function() use ($app){

	$users = $app->db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

	//Referes to the views folder
	$app->render('home.php',[
		'users' => $users
		]);

})->name('homepage');

?>