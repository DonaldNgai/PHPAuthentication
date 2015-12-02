<?php

$app->get('/createListing', function() use ($app){

	//Referes to the views folder
	$app->render('createListing.php',[

		]);

})->name('createListing');

$app->post('/createListing', function() use ($app){
echo "hello";
	// $allPostVars = $this->app->request->post();
 //    $userId = $allPostVars['user'];
	// $listing = $app->db->prepare("
	// 	INSERT INTO table_name 
	// 	(ItemName,OwnerName,Description,Quantity,Cost,Deposit,Category)
	// 	VALUES 
	// 	(value1,value2,value3,...);
	// 	");
	

})->name('createListing.post');

?>