<?php
$fb = new Facebook\Facebook([
	  'app_id' => '560678407417714',
	  'app_secret' => 'b3cab76afdf226d396303d749df4d2ff',
	  'default_graph_version' => 'v2.4',
      'default_access_token' => 'APP-ID|APP-SECRET'
	  ]);

$app->get('/login',function() use ($app,$fb){

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email', 'user_likes']; // optional
	$loginUrl = $helper->getLoginUrl('http://localhost/facebook-callback', $permissions);

$app->render('login.php',[
		'loginUrl' => $loginUrl
		]);
})->name('loginPage');


//callback
$app->get('/facebook-callback', function() use ($app,$fb){

	$helper = $fb->getRedirectLoginHelper();

	try {
	  $accessToken = $helper->getAccessToken();
	} 

	catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} 

	catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if (isset($accessToken)) {
	  // Logged in!
	 	$_SESSION['facebook_access_token'] = (string) $accessToken;

	  // Now you can redirect to another page and use the
	  // access token from $_SESSION['facebook_access_token']
	  // OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
	}
});