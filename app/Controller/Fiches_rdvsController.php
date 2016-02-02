<?php 

namespace Controller;

use \W\Controller\Controller;

class Fiches_rdvsController extends Controller
{
	
	public function ajoutFiche()
	{
		$this->allowTo(['admin','staff']);
		$fiches_rdvManager = new \Manager\Fiches_rdvsManager();
		$rdv = $fiches_rdvManager->rdvExists($_REQUEST['date'],$_REQUEST['id']);
		if(empty($_REQUEST['date']) || $rdv['count(date)'] >= 1 && $rdv['count(id_users)'] >= 1)
		{
			$this->redirectToRoute('fiche_client',['id'=>$_REQUEST['id']]);	
		} else {
			// Si j'ai une date
			$ficheId = $fiches_rdvManager->getLastInsertId($_REQUEST['date'],$_REQUEST['id']);
			// ID de la fiche
			$this->show('fiche/ajoutFiche',['ficheId' => $ficheId]);
		}
	}

	public function fichesclient($id)
	{
		$this->allowTo(['admin','staff']);
		$fiches_rdvsManager = new \Manager\fiches_rdvsManager();
		$fiche = $fiches_rdvsManager->getDateByIdUser($id);
		$this->show('fiche/fiche_rdv', ['fiche' => $fiche, 'clientId' => $id]);
	}
}