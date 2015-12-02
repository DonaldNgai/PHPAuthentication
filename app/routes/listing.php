<?php

$app->get('/listing',function() use($app){

	$listings = $app->db->query("
		select * from Listings;
		")->fetchAll(PDO::FETCH_ASSOC);

	//Referes to the views folder
	$app->render('listing.php',[
		'Listings' => $listings
		]);

})->name('listingPage');

?>