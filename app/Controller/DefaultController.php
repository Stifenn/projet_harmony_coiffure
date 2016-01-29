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
		$this->show('default/home');
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

	// fonction qui envoi un email pour changer de mot de passe
	public function lostPassword()
	{
		$email = $_POST['email'];
		// je vérifie si l'email existe en DB
		$usersManager = new \W\Manager\UserManager();
		$emailExists = $usersManager->emailExists($email);

		if ($emailExists) {
			// je récupère l'id de l'utilisateur et son nom
			$currentUser = $usersManager->getUserByUsernameOrEmail($email);
			$idUser = $currentUser['id'];
			$nomUser = $currentUser['nom'];
			// je crée un token (une chaine de 32 caractères aléatoires)
			$token = \W\Security\StringUtils::randomString(32);
			// j'insère en DB le token et l'id de l'utilisateur
			$tokenManager = new \Manager\TokenManager();
			$tokenManager->insert([
					'token' => $token,
					'id_users' => $idUser,
					]);
			// j'envoi un email avec un lien
			// et donc j'ai une route en GET /login/lostpassword/[:token]
			$usersManager = new \Manager\UserManager();
			$this->sendMail($email, $token, $nomUser);
		}
		$this->redirectToRoute('login');
	}

	// fonction qui envoi un email avec un lien pour changer son mot de passe perdu
	public function sendMail($email, $token, $nomUser)
	{
		// je recupère les informations de configuration
		$ini = parse_ini_file('../app/configmail.ini');

		$mail = new \PHPMailer;
		
		$message = 'Bonjour,<br><br>Vous avez fait une demande de réinitialisation de votre mot de passe,
		cliquez sur le lien ou copier/coller le dans la barre de votre navigateur<br><br>
		<a href="http://127.0.0.1/login/lostpassword/'.$token.'">http://127.0.0.1/login/lostpassword/'.$token.'</a>';

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = $ini['comptemail'];

		//Password to use for SMTP authentication
		$mail->Password = $ini['comptepassword'];

		//Set who the message is to be sent from
		$mail->setFrom('harmony-coiffure@gmail.com', 'Harmony Coiffure');

		//Set an alternative reply-to address
		$mail->addReplyTo('harmony-coiffure@gmail.com', 'Harmony Coiffure');

		//Set who the message is to be sent to
		$mail->addAddress($email, $nomUser);

		//Set the subject line
		$mail->Subject = 'Reinitialisation de votre mot de passe';

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($message);

		//send the message, check for errors
		if (!$mail->send()) {
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		    $this->show('user/result_mail', ['errorMail' => true]);
		} else {
		    //echo "Message sent!";
		    $this->show('user/result_mail', ['sentMail' => true]);
		}
	}

	// Page contact et fonction
	public function contact()
	{
		// si on a reçu le formulaire
		if (isset($_POST['submit-message'])) {
			// on regarde si tous les champs sont rempis
			if ( isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message']) ) {
				$message = $_POST['message'];
				$sujet = $_POST['sujet'];
				$nom = $_POST['nom'];
				$email = $_POST['email'];
				// je recupère les informations de configuration
				$ini = parse_ini_file('../app/configmail.ini');

				$mail = new \PHPMailer;
				
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();

				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;

				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';

				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';
				// use
				// $mail->Host = gethostbyname('smtp.gmail.com');
				// if your network does not support SMTP over IPv6

				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;

				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';

				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;

				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = $ini['comptemail'];

				//Password to use for SMTP authentication
				$mail->Password = $ini['comptepassword'];

				//Set who the message is to be sent from
				$mail->setFrom($email, $nom);

				//Set an alternative reply-to address
				$mail->addReplyTo($email, $nom);

				//Set who the message is to be sent to
				$mail->addAddress($ini['comptemail'], $ini['comptename']);

				//Set the subject line
				$mail->Subject = $sujet;

				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($message);

				//send the message, check for errors
				if (!$mail->send()) {
				    //echo "Mailer Error: " . $mail->ErrorInfo;
				    $this->show('user/result_mail', ['errorMail' => true]);
				} else {
				    //echo "Message sent!";
				    $this->show('user/result_mail', ['sentMail' => true]);
				}
			}
			$this->show('default/contact', ['errorInput' => true]);
		}
		$this->show('default/contact');
	}
}