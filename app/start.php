<?php

require '../vendor/autoload.php';
use Noodlehaus\Config;
use DonaldNamespace\User\User;

session_cache_limiter(false);
session_start();
ini_set('display_errors', 'On');

define ('INC_ROOT', dirname(__DIR__));

$app = new \Slim\Slim([
		'mode' => file_get_contents(INC_ROOT . '/mode.php'),
        'view' => new \Slim\Views\Twig()
    ]);

$app->configureMode($app->config('mode'),function() use($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require ('database.php');

$app->container->set('user', function(){
	return new User;
});

//Database
$app->container->singleton('db',function(){
	return new PDO('mysql:host=localhost;dbname=Shareables','root','root');
});

//Views
$view = $app->view();
$view->setTemplatesDirectory('../app/views');
$view->parserExtensions =[
	new \Slim\Views\TwigExtension()
];

require 'routes.php';


$app->get('/hello/:name', function ($name) {
    echo "Hetto, $name";
    
});

$app->run();

?>