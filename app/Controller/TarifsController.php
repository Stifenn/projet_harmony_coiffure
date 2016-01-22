<?php

namespace Controller;

use \W\Controller\Controller;

class TarifsController extends Controller
{
	function Tarifs()
	{
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
		$tarifsManager = new \Manager\TarifsManager();
		$Tarifs = $tarifsManager->findAll();
		$this->show('tarifs/tarifs',['Tarifs' => $Tarifs]);
	}

	function ModifierTarifs($id)
	{
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
		$TarifsManager = new \Manager\TarifsManager();

		if(isset($_REQUEST['modifier']))
		{
			$ModifierTarifs = $TarifsManager->update([
				'name' => $_REQUEST['name'],
				'prix_femmes' => $_REQUEST['prix_femmes'],
				'prix_hommes' => $_REQUEST['prix_hommes']],
				$id,$stripTags = true);
		}elseif(isset($_REQUEST['supprimer']))
		{
			$SupprimerTarifs = $TarifsManager->delete($id);
		}
		$this->redirectToRoute('administration_tarifs');
	}

	function AjouterTarifs()
	{
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
		$TarifsManager = new \Manager\TarifsManager();
		$AjouterTarifs = $TarifsManager->insert([
			'name' => $_REQUEST['name'],
			'prix_femmes' => $_REQUEST['prix_femmes'], 
			'prix_hommes' =>$_REQUEST['prix_hommes']
		]);
		$this->redirectToRoute('administration_tarifs');
	}
}