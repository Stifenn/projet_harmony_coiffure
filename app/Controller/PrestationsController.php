<?php 

namespace Controller;

use \W\Controller\Controller;

class PrestationsController extends Controller
{
	public function prestation()
	{
		$this->allowTo(['admin','staff']);
		$prestationsManager = new \Manager\PrestationsManager();
		if(!empty($_REQUEST['nom']) || !empty($_REQUEST['description'])){
			$modif = $prestationsManager->insert(['name'=>$_POST['nom'],'description'=>$_POST['description'],'id_fiches_rdv'=>$_POST['idFiche']]);
			$this->redirectToRoute('modif_fiche',['id' => $_POST['idFiche']]);
		}
	}


	public function modifFiche($id)
	{
		$this->allowTo(['admin','staff']);
		$prestationsManager = new \Manager\PrestationsManager();
		$prestation = $prestationsManager->getFicheById($id);
		$this->show('fiche/modifFiche',['prestation' => $prestation, 'idFiche' => $id]);
	}

}