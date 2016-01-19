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
				
				$this->redirectToRoute('login');
			}
			$this->show('user/create_user', ['errorPass' => true]);
			//$this->redirectToRoute('create_user');
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
				$this->redirectToRoute('manage');
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

	/**
	 * Page de profil utilisateurs
	 */
	public function profil()
	{
		$userManager = new \Manager\UserManager();
		$user = $userManager->find($_SESSION['user']['id']);

		$this->show('user/profil', ['user' => $user]);
	}

	// Mise à jour de son profil (compte)
	public function updateUser($userId)
	{
		if(!is_numeric($userId)) {
			$this->redirectToRoute('profil');
		}

		// je récupère la ligne en bdd
		$userManager = new \Manager\UserManager();
		$currentUser = $userManager->find($userId);

		// je compare le mdp rentré par l'utilisateur et celui en DB
		if ( password_verify($_POST['password'], $currentUser['password']) ) {
			// si c'est true
			// je regarde si l'utilisateur veut changer son mot de passe (et plus)
			if ( isset($_POST['password-new']) && isset($_POST['password-new-confirm']) && !empty($_POST['password-new']) && !empty($_POST['password-new-confirm']) ) {
				// je compare si le nouveau mot de passe et la vérification du nouveau mot de passe sont egaux
				if ( $_POST['password-new'] == $_POST['password-new-confirm']) {
					// si oui, je teste les autres champs
					if ( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) ) {
						$userManager->update([
									'nom' => $_POST['nom'],
									'prenom' => $_POST['prenom'],
									'email' => $_POST['email'],
									'password' => password_hash($_POST['password-new'], PASSWORD_DEFAULT)],
									$userId);
						$this->redirectToRoute('logoff');
					}
				} else { // les mdp sont différents
					$this->show('user/profil_error', ['errorNewPass' => true]);
					//$this->redirectToRoute('profil', ['errorNewPass' => true]);
				}
				// si je ne change pas le mdp
				// si je change l'email (et plus)
			} elseif ( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) ) {
				if ( $currentUser['email'] != $_POST['email'] ) {
					$userManager->update([
									'nom' => $_POST['nom'],
									'prenom' => $_POST['prenom'],
									'email' => $_POST['email']],
									$userId);
						$this->redirectToRoute('logoff');
				} else {
					// on change juste le nom et/ou le prenom
					$userManager->update([
									'nom' => $_POST['nom'],
									'prenom' => $_POST['prenom']],
									$userId);
						$this->redirectToRoute('profil');
				}
			}
		}
		$this->show('user/profil_error', ['errorPass' => true]);
		//$this->redirectToRoute('profil', ['errorPass' => true]);
	}

	// suppression de son compte par l'utilisateur
	// en fait on fait juste un update du mdp et email pour ne pas perdre le suivie des prestations
	public function deleteUser($userId)
	{
		if(!is_numeric($userId)) {
			$this->redirectToRoute('profil');
		}

		$usersManager = new \Manager\UserManager();
		$usersManager->update([
						'email' => NULL,
						'password' => NULL],
						$userId);
		$this->redirectToRoute('logoff');
	}
}