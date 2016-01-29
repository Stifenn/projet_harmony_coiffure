<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$insertCommentaire ='';
		$commentairesManager = new \manager\CommentairesManager();
		$TarifsManager = new \manager\TarifsManager();
		$produitManager = new \manager\ProduitsManager();
		if(isset($_REQUEST) && !empty($_REQUEST)){
			$insertCommentaire= $commentairesManager ->insertCommentaireHome($_REQUEST['name'],$_REQUEST['email'],$_REQUEST['message']);
		}
		$showCommentaire =$commentairesManager->showCommentairesHome();
		$tarif = $TarifsManager->showTarif();
		$produit = $produitManager->showProduit();
		$this->show('default/home',['insertCommentaire'=>$insertCommentaire,'showCommentaire'=>$showCommentaire,'tarif'=>$tarif,'produit'=>$produit]);
	}

	/**
	 * Page de connexion
	 */
	public function login()
	{
		if(isset($_POST['login-submit'])) {
			// Si on a reçu une soumission de formulaire

			if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])) {
				// S'il manque des informations

				$this->redirectToRoute('login');
			}

			$authManager = new \W\Security\AuthentificationManager();

			$userId = $authManager->isValidLoginInfo($_POST['email'], $_POST['password']);

			if($userId) {
				// Les infos sont cohérentes
				$usersManager = new \Manager\UserManager();
				$user = $usersManager->find($userId);
				 
				unset($user['password']);

				// Enregistrement des infos utilisateur en session
				$authManager->logUserIn($user);

				// Retour à l'accueil
				$this->redirectToRoute('home');
			}
			// Si il y a une erreur dans le login ou le mot de passe
			$this->show('default/login', ['errorConnection' => true]);
		}
		// on va sur la page de login de base
		$this->show('default/login');
	}

	/* pour la déconnexion */
	public function logoff()
	{
		$authManager = new \W\Security\AuthentificationManager();
		$authManager->logUserOut();
		// on se déconnecte, on retourne à l'accueil
		$this->redirectToRoute('home');
	}

	/**
	 * Page d'accueil de l'administration
	 */
	public function admin()
	{
		$this->show('default/admin');
	}



}