<?php

namespace Manager;

class UserManager extends \W\Manager\Manager 
{

	public function findUsers($name)
	{
		$sql = "SELECT * FROM ". $this->table ." WHERE nom LIKE :name";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':name','%'.$name.'%');
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getFicheClient($id)
	{
		$sql = "SELECT nom,prenom,users.id AS userId,date,description,fiches_rdvs.id AS ficheId ". 
		"FROM ". $this->table ." LEFT JOIN fiches_rdvs ON users.id = fiches_rdvs.id_users ".
		"LEFT JOIN prestations ON fiches_rdvs.id = prestations.id_fiches_rdv".
		" WHERE ". $this->table .".id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id,\PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();	
	}

	// fonction qui vérifie si un id existe en DB
	public function idExists($userId)
	{
	   $app = getApp();


	   $sql = "SELECT ". $app->getConfig('security_id_property') ." FROM " . $app->getConfig('security_user_table') .
	           " WHERE ". $app->getConfig('security_id_property') ." = :userId LIMIT 1";
	   $dbh = \W\Manager\ConnectionManager::getDbh();
	   $sth = $dbh->prepare($sql);
	   $sth->bindValue(":userId", $userId);
	   if ($sth->execute()){
	       $foundUser = $sth->fetch();
	       if ($foundUser){
	           return true;
	       }
	   }
	   return false;
	}
}