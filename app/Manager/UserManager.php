<?php

namespace Manager;

class UserManager extends \W\Manager\Manager 
{
	public function findUsers($name)
	{
		$sql = "SELECT * FROM ". $this->table ." WHERE nom = :name";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':name',$name);
		$sth->execute();
		return $sth->fetchAll();
	}
}