<?php

namespace Manager;

use \W\Manager\Manager;

class Fiches_rdvsManager extends  Manager
{
	public function getLastInsertId($date,$idUsers)
	{
		$sql = "INSERT INTO Fiches_rdvs (date,id_users) VALUES (:date,:idUsers)";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':date',$date);
		$sth->bindValue(':idUsers',$idUsers);
		$sth->execute();
		$lastId = $this->dbh->lastInsertId();
		return $lastId;
	}

}