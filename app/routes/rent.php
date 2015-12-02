<?php

$app->get('/rent/:ListingID',function($ListingID) use($app){

	$listing = $app->db->prepare("
		select * from Listings
		where ListingID = :ListingID;
		");

	$listing->execute(['ListingID' => $ListingID]);

	$listing = $listing->fetchAll(PDO::FETCH_ASSOC);

	if (!$listing){
		$app->notFound();
	}

	var_dump($listing);
	die();

	//Referes to the views folder
	$app->render('rent.php',[
		'listing' => $listing
		]);



})->name('rentPage');

?>