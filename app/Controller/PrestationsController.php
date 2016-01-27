<?php 

namespace Controller;

use \W\Controller\Controller;

class PrestationsController extends Controller
{
	public function prestation()
	{
		$prestationsManager = new \Manager\PrestationsManager();
	
		if(!empty($_REQUEST['nom']) || !empty($_REQUEST['description'])){
			$modif = $prestationsManager->insert(['name'=>$_POST['nom'],'description'=>$_POST['description'],'id_fiches_rdv'=>$_POST['idFiche']]);
			$this->redirectToRoute('modif_fiche',['id' => $_POST['idFiche']]);
		}
}


	public function modifFiche($id)
	{
		$prestationsManager = new \Manager\PrestationsManager();
		var_dump($_REQUEST);
		$prestation = $prestationsManager->getFicheById($id);
		$this->show('fiche/modifFiche',['prestation' => $prestation]);
	}

}