<?php

namespace App\Middlewares;
use PDO;

class IpFilter
{
	protected $db;
	
	public function __construct(PDO $db)
	{
			$this->db = $db;
	}
	
	public function __invoke($request, $response, $next)
	{
		
		//get list of blocked ip
		$ips = $this->db->query("SELECT ip FROM blocked")->fetchAll(PDO::FETCH_COLUMN, 0);
		
		// check if the current user ip address is in the list
		if(in_array($_SERVER['REMOTE_ADDR'], $ips))
		{
			return $response->withStatus(401)->write('Danied');
		}
		
		
		return $next($request, $response);
	}
}
