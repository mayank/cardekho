<?php

require_once('../dao/DaoFactory.php');

class Validator
{
	public function validateTemplate( $input )
	{
		if( !isset($input['name']) || empty($input['name']) ) 
		{
			return "Please Enter Template Name";
		}	
		if( !isset($input['template']) || empty($input['template']) ) 
		{
			return "Please Enter Template";
		}
		return null;
	}
	
	public function validateCSVFile( $file )
	{
		if( !isset($file['csv']) || empty($file['csv']) || $file['csv']['size'] == 0 || $file['csv']['type'] !== 'text/csv' ) 
		{
			return "Please Upload Valid CSV";
		}
		return null;
	}
	
	public function validateLogin( $input )
	{
		if( !isset($input['username']) || empty($input['username']) ) 
		{
			return "Please Enter Username";
		}
	 	if( !isset($input['password']) || empty($input['password']) )
		{
			return "Please Enter Password";
		}	
		if( DaoFactory::getInstance('UserDao')->isUserValid( $input['username'], $input['password'] ) == false )
		{
			return "Username / Password doesn't Matched";
		}		
		return null;
	} 
}
