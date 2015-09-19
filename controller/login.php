<?php

require_once('../lib/Factory.php');

$validator = Factory::getInstance('Validator');

$error = $validator->validateLogin( $_POST );

if( !empty($error) ) {
	header("Location:/car/views/login.php?error=$error");
	exit();
}

$userManager = Factory::getInstance('UserManager');
$userModel = $userManager->getUser( $_POST['username'] );

session_start();
$_SESSION['_user'] = serialize($userModel);

header('Location:/car/views/admin.php');
