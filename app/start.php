<?php

require '../vendor/autoload.php';

$app = new \Slim\Slim([
        'view' => new \Slim\Views\Twig()
    ]);

//Database
$app->container->singleton('db',function(){
	return new PDO('mysql:host=localhost;dbname=Shareables','donald','alchemist');
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