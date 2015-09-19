<?php

class UserManager
{
	public function getUser( $username )
	{
		return DaoFactory::getInstance('UserDao')->getUserByUsername( $username );
	}
}
