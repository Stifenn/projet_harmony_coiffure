<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
	//création d'un compte par l'utilisateur (client)
	public function createUser()
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

	/**
	 * Page de gestion des utilisateurs
	 */
	public function manage()
	{
		$this->allowTo(['admin', 'staff']);

		$usersManager = new \Manager\UserManager();
		$users = $usersManager->findAll('email');

		$this->show('user/manage', ['users' => $users]);
	}

	// création d'un compte par l'admin ou un employé (staff)
	public function userCreate()
	{
		$this->allowTo(['admin', 'staff']);
		// si le compte a créer est un compte client, on ne met pas de mail ni password
		if ($_POST['role'] == 'client') {
			if( isset($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) ) {
				// on fait l'insertion dans la base
				$usersManager = new \Manager\UserManager();
				$usersManager->insert([
						'nom' => $_POST['nom'],
						'prenom' => $_POST['prenom'],
						'role' => 'client',
					]);
				$this->redirectToRoute('manage');
			}
		} elseif ($_POST['role'] == 'staff') {
			// si tous les champs sont renseignés
			if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-confirm']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) && ($_POST['role'] == 'client' || $_POST['role'] == 'staff')) {
				// on verifie si le password et le password-confirm sont égaux
				if ($_POST['password'] == $_POST['password-confirm']) {
			
					// on fait l'insertion dans la base
					$usersManager = new \Manager\UserManager();
					$usersManager->insert([
							'nom' => $_POST['nom'],
							'prenom' => $_POST['prenom'],
							'email' => $_POST['email'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
							'role' => 'staff',
						]);
					$this->redirectToRoute('manage');
				}
				$this->redirectToRoute('manage', ['errorPass' => true]);
			}
		}
		// on va sur la page de gestion des utilisateurs
		$this->show('user/manage');
	}

	// suppression d'un compte par l'admin seulement
	public function userDelete($userId)
	{
		$this->allowTo('admin');

		if(!is_numeric($userId)) {
			$this->redirectToRoute('manage');
		}

		$usersManager = new \Manager\UserManager();
		$usersManager->delete($userId);
		$this->redirectToRoute('manage');
	}
}