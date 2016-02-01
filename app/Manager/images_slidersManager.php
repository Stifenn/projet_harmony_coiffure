<?php 

	namespace Manager;

	class images_slidersManager extends \W\Manager\Manager
	{
		
		public function update_image_slider($chemin, $label, $numero){

			$sql= "UPDATE images_sliders SET chemin = :chemin, label = :label WHERE numero = :numero";
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(':chemin', $chemin);
			$sth->bindValue(':label' , $label);
			$sth->bindValue(':numero', $numero);
			return $sth->execute();
		}

		public function showSliderHome()
		{
			$sql = "SELECT chemin,label FROM images_sliders";
			$sth = $this->dbh->query($sql);
			$sth->execute();
			return $sth->fetchAll();
		}
	}