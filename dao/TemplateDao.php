<?php

require_once('BaseDao.php');

class TemplateDao extends BaseDao
{
	public function createTemplate( $name, $text )
	{
		$db = $this->getConnection();
		$sql = $db->prepare("insert into templates (name, template) values(:name, :text)");
		$sql->bindValue(":name", $name, PDO::PARAM_STR);
		$sql->bindValue(":text", $text, PDO::PARAM_STR);
		$sql->execute();
		$sql->closeCursor();
	}

	public function getAllTemplates()
	{
		$db = $this->getConnection();
		$sql = $db->prepare("select * from templates");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
}
