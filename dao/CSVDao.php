<?php

require_once('BaseDao.php');

class CSVDao extends BaseDao
{
	public function saveCSV( $filename, $fileId )
	{
		$db = $this->getConnection();
		$sql = $db->prepare("insert into csv (hash,name) values(:hash, :name)");
		$sql->bindValue(":hash", $fileId, PDO::PARAM_STR);
		$sql->bindValue(":name", $filename, PDO::PARAM_STR);
		$sql->execute();
		$sql->closeCursor();
	}

	public function getCSVList()
	{
		$db = $this->getConnection();
		$sql = $db->prepare("select * from csv");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
}
