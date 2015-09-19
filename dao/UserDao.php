<?php

include('BaseDao.php');
include('../models/UserModel.php');

class UserDao extends BaseDao
{
	public function isUserValid( $username, $password )
	{
		$db = $this->getConnection();
		$sql = $db->prepare("select count(1) from users where username = :username and password = :password");
		$sql->bindValue(":username", $username, PDO::PARAM_STR);
		$sql->bindValue(":password", $password, PDO::PARAM_STR);
		$sql->setFetchMode(PDO::FETCH_COLUMN,0);
		$sql->execute();
		return $sql->fetch() == 1 ? true : false;
	}
	
	public function getUserByUsername( $username )
	{
		$db = $this->getConnection();
		$sql = $db->prepare("select * from users where username = :username");
		$sql->bindValue(":username", $username, PDO::PARAM_STR);
		$sql->setFetchMode(PDO::FETCH_CLASS, 'UserModel');
		$sql->execute();
		return $sql->fetch();
	}
}
