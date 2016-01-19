<?php 

namespace Controller;

use \W\Controller\Controller;

class PrestationsController extends Controller
{
	public function prestation()
	{
		$prestationsManager = new \Manager\PrestationsManager();
		$prestation = $prestationsManager->insert([
			'name'=> $_REQUEST['nom'],
			'description'=>$_REQUEST['description'], 
			'id_fiches_rdv'=>$_REQUEST['idFiche']]);
		$this->redirectToRoute('fiche_client',['id' => $_REQUEST['iduser']]);
	}

}