<?php

namespace Manager;

use \W\Manager\Manager;

class produitsManager extends  Manager
{

	public function update_image_produit($chemin, $label, $nom, $description, $numero){

		$sql= "UPDATE produits SET chemin = :chemin, label = :label, nom = :nom, description = :description WHERE numero = :numero";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':chemin', $chemin);
		$sth->bindValue(':label' , $label);
		$sth->bindValue(':nom' , $nom);
		$sth->bindValue(':description' , $description);
		$sth->bindValue(':numero', $numero);
		return $sth->execute();
	}
}