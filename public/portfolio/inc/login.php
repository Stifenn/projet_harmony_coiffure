<?php 
	session_start();

	require_once 'connexion.php';
	require_once 'functions.php';

	$tryConnection = true;

	// Si on a recu des données de formulaire
	if(isset($_POST['connect'])) {

		if(empty($_POST['mail'])) {
			$errorMail = true;
			$tryConnection = false; // On n'essaie pas de se connecter
		} else {
			// Nettoyage des caractères spéciaux, avant validation
			$mail = filter_var($_POST['mail'], FILTER_SANITIZE_SPECIAL_CHARS);

	        // On teste la validité du mail
	        $isMailValid = filter_var($mail, FILTER_VALIDATE_EMAIL);

	        if(!$isMailValid)
	        	$tryConnection = false;
		}
		if(empty($_POST['pass'])) {
			$errorPass = true;
			$tryConnection = false;
		}
	} else {
		$tryConnection = false; // On n'essaie pas de se connecter
	}

	if($tryConnection) {
		$connectedUser = connectUser($pdo, $mail, $_POST['pass']);
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php if(isset($connectedUser) && $connectedUser) : ?>
		Connecté !
		<?php
			// j'ai un tableau qui contient id, email, id_role, name, FrName
			$_SESSION['id'] = $connectedUser['id'];
			$_SESSION['email'] = $connectedUser['email'];
			$_SESSION['id_role'] = $connectedUser['id_role'];
			$_SESSION['name'] = $connectedUser['name'];
			$_SESSION['FrName'] = $connectedUser['FrName'];

			if ($_SESSION['name'] == 'ADMIN') {
				echo 'Vous etez un ' . $_SESSION['FrName'] .' !';
			}

			if ($_SESSION['name'] == 'EDITOR') {
				echo 'Vous etez un ' . $_SESSION['FrName'] .' !';
			}
		?>
	<?php else : ?>
		
		<form action="#" method="POST">
			<?php if(isset($connectedUser) && !$connectedUser): ?>
				Connexion impossible
			<?php endif ?>
			<header>
				<h1>Connexion</h1>
			</header>
			<div>
				<input type="text" name="mail" placeholder="E-mail"><br>
				<?php if(isset($errorMail)) echo '<div class="error">Entrez un e-mail</div>'; ?>
				<?php if(isset($isMailValid) && !$isMailValid) echo '<div class="error">Le e-mail n\'est pas valide</div>'; ?>
			</div>
			<div>
				<input type="password" name="pass" placeholder="Mot de passe"><br>
				<?php if(isset($errorPass)) echo '<div class="error">Entrez un mot de passe</div>'; ?>
			</div>
			<div>
				<input type="submit" name="connect" value="Connexion">	
			</div>
		</form>
	<?php endif; ?>

		<a href="../php/front/index.php" >Retour</a>
</body>
</html>