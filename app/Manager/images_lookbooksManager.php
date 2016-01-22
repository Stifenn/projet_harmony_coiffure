<?php 

	namespace Manager;

	class images_lookbooksManager extends \W\Manager\Manager{
		
	public function update_image_lookbook($chemin, $label , $numero){

		$sql= "UPDATE images_lookbooks SET chemin = :chemin, label = :label WHERE numero = :numero";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':chemin', $chemin);
		$sth->bindValue(':label' , $label);
		$sth->bindValue(':numero' , $numero);
		return $sth->execute();
	}
}