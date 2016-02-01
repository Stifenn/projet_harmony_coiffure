<?php

namespace Manager;

use \W\Manager\Manager;

class TarifsManager extends  Manager
{
	public function showTarif()
	{
		$sql = 'SELECT name,prix_femmes,prix_hommes FROM tarifs';
		$sth = $this->dbh->query($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
}