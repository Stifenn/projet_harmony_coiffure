<?php

namespace Manager;

use \W\Manager\Manager;

class PrestationsManager extends  Manager
{
	public function getFicheById($idFiche)
	{
		$sql = "SELECT description,name,id_fiches_rdv FROM prestations WHERE id_fiches_rdv = :idFiche";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':idFiche',$idFiche);
		$sth->execute();
		return $sth->fetchAll();
	}
}