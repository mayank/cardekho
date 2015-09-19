<?php

require_once('UserDao.php');
require_once('CSVDao.php');
require_once('TemplateDao.php');

class DaoFactory
{
	static $instanceArray = array();

	public static function getInstance( $class )
	{
		if( !isset($instanceArray[$class]) || empty($instanceArray[$class]) )
		{
			$instanceArray[$class] = new $class();
		}
		return $instanceArray[$class];
	}
}
