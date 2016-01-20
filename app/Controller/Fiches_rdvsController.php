<?php 

namespace Controller;

use \W\Controller\Controller;

class Fiches_rdvsController extends Controller
{
	
	public function ajoutFiche()
	{
		$fiches_rdvManager = new \Manager\Fiches_rdvsManager();
		if(empty($_REQUEST['date']))
		{
			$this->redirectToRoute('fiche_client',['id'=>$_REQUEST['id']]);	
		} else {
			// Si j'ai une date
			$ficheId = $fiches_rdvManager->getLastInsertId($_REQUEST['date'],$_REQUEST['id']);
			// ID de la fiche
			$this->show('fiche/ajoutFiche',['ficheId' => $ficheId]);
		}
		
	}
}