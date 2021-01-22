<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails'=> true,
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
       
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()),'/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};


$app->get('/', function($request, $response){

   return $this->view->render($response, 'home.twig', [
    'user'=>'Billy',
    ]);
})->setName('home');

$app->get('/users', function($request, $response){
 echo 'yes you are in';
}

$app->run();