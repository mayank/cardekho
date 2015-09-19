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

if( $user->getType() == 'Executive' ){
	header('Location:/car/views/login.php?error=You Dont Have Sufficient Rights');
}

$validator = Factory::getInstance('Validator');
$error = $validator->validateTemplate( $_POST );	
if( !empty($error) ){
	header("Location:/car/views/admin.php?error=$error");
}
Factory::getInstance('TemplateManager')->createTemplate( $_POST['name'], $_POST['template'] );
header("Location:/car/views/admin.php?success=Template Created");
