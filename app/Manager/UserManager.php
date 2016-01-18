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

	public function getFicheClient($id)
	{
		$sql = "SELECT nom,prenom,date,description ". 
		"FROM ". $this->table ." ,fiches_rdvs, prestations ". 
		"WHERE ". $this->table .".id = :id ".
		"AND users.id = fiches_rdvs.id_users ".
		"AND fiches_rdvs.id = prestations.id_fiches_rdv";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id);
		$sth->execute();
		return $sth->fetchAll();
		
	}

}