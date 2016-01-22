<?php

namespace Manager;

use \W\Manager\Manager;

class images_sitesManager extends  Manager
{
	public function update_image_site($chemin, $label, $position){

		$sql= "UPDATE images_sites SET chemin = :chemin, label = :label WHERE position = :position";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':chemin', $chemin);
		$sth->bindValue(':label' , $label);
		$sth->bindValue(':position', $position);
		return $sth->execute();
	}
}