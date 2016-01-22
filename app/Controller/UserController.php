<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
	//création d'un compte par l'utilisateur (client)
	public function createUser()
	{
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
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

		// je récupère la ligne en DB
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
		// je récupère la ligne en DB
		$userManager = new \Manager\UserManager();
		$currentUser = $userManager->find($userId);

		if(!is_numeric($userId)) {
			$this->redirectToRoute('profil');
		}

		// je compare le mdp rentré par l'utilisateur et celui en DB
		if ( password_verify($_POST['password-client'], $currentUser['password']) ) {
			// si c'est true
			// je supprime le compte
			$userManager->delete($userId);
			// puis je le recré avec le meme id, nom et prenom mais sans pass ni email
			$userManager->insert([
							'id' => $userId,
							'nom' => $currentUser['nom'],
							'prenom' => $currentUser['prenom'],
							'role' => 'client',
						]);
			$this->redirectToRoute('logoff');
		}
		$this->show('user/profil_error', ['errorPass' => true]);
	}

	// récupération du compte créée par l'admin (de base sans mail ni mdp)
	public function recupUser()
	{
		// si le champs num client est rempli
		if ( isset($_POST['num-client']) && !empty($_POST['num-client'])) {
			$userId = $_POST['num-client'];
		} else {
			$this->redirectToRoute('create_user');
		}

		if(!is_numeric($userId)) {
			$this->redirectToRoute('create_user');
		}
		// je vérifie si l'id existe en DB
		$userManager = new \Manager\UserManager();
		$idExist = $userManager->idExists($userId);
		// si oui je recup les infos
		if ($idExist) {
			$currentUser = $userManager->find($userId);
			// je verifie si les champs nom et prenom sont remplis
			if ( isset($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) ) {
				
				$nom = trim(mb_strtolower($_POST['nom'], 'UTF-8'));
				$prenom = trim(mb_strtolower($_POST['prenom'], 'UTF-8'));
				$nomDB = mb_strtolower($currentUser['nom'], 'UTF-8');
				$prenomDB = mb_strtolower($currentUser['prenom'], 'UTF-8');

				if ($nom == $nomDB && $prenom == $prenomDB) {
					$this->show('user/recup_user', ['currentUser' => $currentUser]);
				}
			}
			$this->redirectToRoute('create_user');
		}
		$this->redirectToRoute('create_user');
	}

	public function updateRecupUser($userId)
	{
		// je récupère la ligne en DB
		$userManager = new \Manager\UserManager();
		$currentUser = $userManager->find($userId);

		// je regarde si l'utilisateur a mis les 2 même mot de passe
		if ( isset($_POST['password']) && isset($_POST['password-confirm']) && !empty($_POST['password']) && !empty($_POST['password-confirm']) ) {
			// je compare si les mots de passe sont egaux
			if ( $_POST['password'] == $_POST['password-confirm']) {
				// si oui, je teste les autres champs
				if ( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) ) {
					$userManager->update([
								'nom' => $_POST['nom'],
								'prenom' => $_POST['prenom'],
								'email' => $_POST['email'],
								'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)],
								$userId);
					$this->redirectToRoute('login');
				}
			}
			// les mdp sont différents
			$this->show('user/recup_error', ['errorPass' => true]);	
		}
	}

}