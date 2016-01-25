<?php 

namespace Controller;

use \W\Controller\Controller;

class PrestationsController extends Controller
{
	public function prestation($id)
	{
		var_dump($_REQUEST);
		// $id : ID de la fiche en cours de modif
		$prestationsManager = new \Manager\PrestationsManager();
		if(empty($_REQUEST['nom']) || empty($_REQUEST['description']))
		{
			$this->redirectToRoute('ajout_fiche');
		} else {
			$prestation = $prestationsManager->insert([
				'name'=> $_REQUEST['nom'],
				'description'=>$_REQUEST['description'], 
				'id_fiches_rdv'=>$_REQUEST['idFiche']]);
			//$this->redirectToRoute('fiche_client',['id' => $_REQUEST['iduser']]);
			$this->show('prestation/prestation');
		}
	}

}