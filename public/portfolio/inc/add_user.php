<?php

	require_once 'connexion.php';
	require_once 'functions.php';

	/* Pour l'affichage du dropdown des roles */
	$roles = getAllRole($pdo);

	/* Si on a recu un nouvel utilisateur à ajouter */
	if(isset($_POST['add_user'])) {

		/* On ferait ici les vérifications des champs */
		if(!empty($_POST['mail']) && (!empty($_POST['pass']))) {
			addUser($pdo, $_POST['mail'], $_POST['pass'], $_POST['id_role']);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ajouter un utilisateur</title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="mail" placeholder="E-mail"><br>
		<input type="password" name="pass" placeholder="Mot de passe"><br>
		<label for="id_role">
			Role :
			<select name="id_role" id="id_role">
				<?php foreach($roles as $role) { ?>
				<option value="<?php echo $role['id'] ?>">
					<?php echo $role['FrName'] ?>
				</option>
				<?php } ?>
			</select>
		</label>
		<input type="submit" name="add_user" value="Ajouter un utilisateur">
	</form>
</body>
</html>