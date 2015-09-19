<?php

require_once('../lib/Factory.php');
require_once('../models/UserModel.php');

// authentication code - to be seperated
session_start();		
if( isset($_SESSION['_user']) ){
	$user = unserialize($_SESSION['_user']);
}
else {
	header('Location:/car/views/login.php');
}
// auth code ends


$validator = Factory::getInstance('Validator');

$error = $validator->validateCSVfile( $_FILES );
if( !empty($error) ) {
	header("Location:/car/views/admin.php?error=$error");
	exit();
}

$uploader = Factory::getInstance('CSVUploader');
$fileId = $uploader->saveCSVFile( $_FILES['csv']['name'], $_FILES['csv']['tmp_name'] );

header("Location:/car/views/admin.php?fileId=$fileId");
