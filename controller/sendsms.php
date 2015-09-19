<?php

require_once('../lib/Factory.php');
require_once('../models/UserModel.php');
require_once('../models/SmsModel.php');

// authentication code - to be seperated
session_start();		
if( isset($_SESSION['_user']) ){
	$user = unserialize($_SESSION['_user']);
}
else {
	header('Location:/car/views/login.php');
}
// auth code ends

$smsObj = new SmsModel();
$smsObj->setName('mayank');
$smsObj->setMobile('8527158769');
$smsObj->setMessage('Hello World');

var_dump( $smsObj->getJsonData() );die;

var_dump( Factory::getInstance('SmsApi')->sendSMS( $smsObj ) );
