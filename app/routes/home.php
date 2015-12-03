<?php

$app->get('/', function() use ($app){

	$users = $app->db->query("select * from Users")->fetchAll(PDO::FETCH_ASSOC);

	//Referes to the views folder
	$app->render('home.php',[
		'users' => $users
		]);

})->name('homepage');

$app->get ('/flash', function() use($app) {
	$app->flash('global', 'you have been registered');
	$app->response->redirect($app->urlFor('homepage'));
});

?>