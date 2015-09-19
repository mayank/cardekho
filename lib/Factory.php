<?php

require_once('Validator/Validator.php');
require_once('UserModule/UserManager.php');
require_once('UserModule/TemplateManger.php');
require_once('UploadModule/CSVUploader.php');
require_once('SMSModule/SmsApi.php');

class Factory
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
