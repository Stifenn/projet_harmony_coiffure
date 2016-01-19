<?php 

namespace Controller;

use \W\Controller\Controller;

class Fiches_rdvsController extends Controller
{
	
	public function ajoutFiche()
	{
		$fiches_rdvManager = new \Manager\Fiches_rdvsManager();
		$ajoutDate = $fiches_rdvManager->getLastInsertId($_REQUEST['date'],$_REQUEST['id']);
		$this->show('fiche/ajoutFiche',['ajoutDate' => $ajoutDate]);
	}
}