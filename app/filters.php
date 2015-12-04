<?php

$authenticationCheck = function($required) use($app){
	return function() use($required, $app){
		if((!$app->auth && $required) || ($app->auth && !$required)){
			$app->redirect($app->urlFor('homepage'));
		}
	};
};

$authenticated = function() use ($authenticationCheck){
	return $authenticationCheck(true);
};

$guest = function() use ($authenticationCheck){
	return $authenticationCheck(false);
};