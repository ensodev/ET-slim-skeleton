<?php

namespace App\Controllers;

class TopicController
{
	
	public function index($request, $response)
	{
		return 'Topic index';
	}
	
	public function show($request, $response, $args)
	{
		//echo $request->getAttribute('token');
		//die();
		return $args['id'];
	}
	
	public function create($request, $response)
	{
		return 'Topic index';
	}
	
}