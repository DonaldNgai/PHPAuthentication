<?php

require '../vendor/autoload.php';
use Noodlehaus\Config;
use DonaldNamespace\User\User;
use DonaldNamespace\Helpers\Hash;
use DonaldNamespace\Validation\Validator;
use DonaldNamespace\Middleware\BeforeMiddleware;
use DonaldNamespace\Mail\Mailer;


session_cache_limiter(false);
session_start();
ini_set('display_errors', 'On');

define ('INC_ROOT', dirname(__DIR__));

$app = new \Slim\Slim([
		'mode' => file_get_contents(INC_ROOT . '/mode.php'),
        'view' => new \Slim\Views\Twig()
    ]);

$app->add(new BeforeMiddleware);

$app->auth = false;

$app->configureMode($app->config('mode'),function() use($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require ('database.php');
require ('filters.php');

$app->container->set('user', function(){
	return new User;
});

$app->container->singleton('hash', function() use($app){
	return new Hash($app->config);
});

$app->container->singleton('validation', function() use($app){
	return new Validator($app->user);
});

$app->container->singleton('mail', function() use($app){
	$mailer = new PHPMailer;

	$mailer->Host = $app->config->get('mail.host');
	$mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
	$mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
	$mailer->Port = $app->config->get('mail.port');
	$mailer->Username = $app->config->get('mail.username');
	$mailer->Password = $app->config->get('mail.password');

	$mailer->isHTML($app->config->get('mail.html'));

	return new Mailer($app->view,$mailer);
;});

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