<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
	public function create_user()
	{
		// si tous les champs sont renseignés
		if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-confirm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) ) {
			// on verifie si le password et le password-confirm sont égaux
			if ($_POST['password'] == $_POST['password-confirm']) {
		
				// on fait l'insertion dans la base
				$usersManager = new \Manager\UserManager();
				$usersManager->insert([
						'nom' => $_POST['nom'],
						'prenom' => $_POST['prenom'],
						'email' => $_POST['email'],
						'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						'role' => 'client',
					]);
				//@todo resultat du insert bool a 1 alors compte enregistré
				$this->redirectToRoute('login');
			}
			$this->redirectToRoute('create_user', ['errorPass' => true]);
		}

	// on va sur la page de création de compte
	$this->show('user/create_user');
	}

	function Recherche()
	{
		
		$usersManager = new \Manager\UserManager();

		if(isset($_REQUEST['name']))
		{
			$recherche = $usersManager->findUsers($_REQUEST['name']);
			$this->show('user/recherche',['recherche' => $recherche]);
		}
		$this->show('user/recherche');
	}

	public function fichesclient($id)
	{
		$usersManager = new \Manager\UserManager();
		$fiche = $usersManager->getFicheClient($id);
		$this->show('fiche/fiche_rdv', ['fiche' => $fiche]);
	}

	public function ajoutFiche()
	{
		var_dump($_REQUEST);
		$fiches_rdvManager = new \Manager\Fiches_rdvsManager();
		//$prestationManager = new \Manager\prestation_rdvsmanager();
		$ajoutDate = $fiches_rdvManager->insert(['date' => $_REQUEST['date'],'id_users'=>$_REQUEST['id']]);
		$date = $fiches_rdvManager->find(['date' => $_REQUEST['date']
			])
		//$ajoutPrestation = $prestationManager->insert(['name'=>$_REQUEST['nom'],'description'=>$_REQUEST['description']]);
		//$this->show('fiche/fiche_rdv', ['ajout' => $ajout]);
		//$this->redirectToRoute('fiche_client');
		$this->show('fiche/ajoutFiche');
	}

}