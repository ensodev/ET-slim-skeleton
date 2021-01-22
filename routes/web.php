<?php


use App\Controllers\TopicController;
use App\Controllers\UserController;

$app->group('/', function(){
    $this->get('', UserController::class.  ':index')->setName('user');
    
});


$app->get('/mw', function(){
		return 'lade';
	})->add($middleware);

