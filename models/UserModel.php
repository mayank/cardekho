<?php

class UserModel
{
	private $username;
	private $password;
	private $type;
	
	const TYPE_ADMIN = 1;
	const TYPE_EXECUTIVE = 2;
	
	public function getType()
	{
		return $this->type == self::TYPE_ADMIN ? 'Admin' : 'Executive';
	}
}
