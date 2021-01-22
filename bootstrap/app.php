<?php

require_once __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails'=> true,
    ]
]);

$container = $app->getContainer();

$container['db'] = function(){
    return new PDO('mysql:host=localhost;dbname=users', 'root', '');
};


$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
       
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()),'/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//$middleware = function($request, $response, $next){
//		$response->getBody()->write(' 3 ');
//		return $next($request, $response);
//};

$lade = '1';

$middleware = function($request, $response, $next){
	global $lade;
		$response->getBody()->write('before ');
		$response = $next($request, $response);
		$response->getBody()->write(' after ');
		
		return $response;
};




require_once __DIR__ . '/../routes/web.php';
