<?php

require_once('../config.php');

class BaseDao 
{
	
	public function getConnection()
	{
		$dsn = "mysql:host=".Config::DB_HOST.";dbname=".Config::DB_NAME;
		return new PDO($dsn, Config::DB_USER, Config::DB_PASS);
	}
}
