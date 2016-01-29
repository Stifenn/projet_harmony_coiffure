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

	public function getDateByIdUser($idUser)
	{
		$sql = "SELECT users.nom,users.prenom,fiches_rdvs.date,fiches_rdvs.id,fiches_rdvs.id_users FROM fiches_rdvs,users WHERE users.id = fiches_rdvs.id_users AND fiches_rdvs.id_users = :idUser";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':idUser',$idUser,\PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getDateById($idUser)
	{
		$sql = "SELECT date FROM Fiches_rdvs WHERE id_users = :idUser";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':idUser',$idUser,\PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetch();
	}

	public function rdvExists($date,$idUsers)
	{
		$sql = "SELECT count(date),count(id_users) FROM fiches_rdvs WHERE fiches_rdvs.date = :date AND id_users = :idusers";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':date',$date,\PDO::PARAM_STR);
		$sth->bindValue(':idusers',$idUsers,\PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetch();
	}
}