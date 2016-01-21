<?php

	$dbResult = getuserByrole($pdo);

	goto solution2; /* goto 'saute' à une autre ligne du code. */
	/* On l'utilise seulement pour les besoins de l'exemple. 
		Ne jamais utiliser goto dans des projets, sauf sous la torture !
	*/

	$roleuser = array();

	/* 
		Solution 1 :
		Les indices du tableau $roleuser sont la description du role en francais
		On n'a pas choisi cette solution, elle est présentée comme une étape vers la compréhension
		de la deuxième solution.
	 */
	foreach($dbResult as $currentRow) {
		/* Pour chaque ligne de résultat */

		$roleNameFR = $currentRow['FrName'];

		/* Si le sous-tableau 'roleName' existe */
		if(isset($roleuser[$roleNameFR])) {

			/* On ajoute l'utilisateur */
			$roleuser[$roleNameFR] []= $currentRow['email'];
		} else {

			$roleuser[$roleNameFR] = array();
			$roleuser[$roleNameFR] []= $currentRow['email'];
		}
	}

	$roleuser = array();

	solution2:
	$roleuser = array();
	/*
		Solution 2 :
		Les indices de $roleuser sont les clés de role en DB, et le role est dans un sous-tableau
	*/
	foreach($dbResult as $currentRow) {
		/* Pour chaque ligne */

		$roleName = $currentRow['name'];

		/* Si le sous-tableau roleName existe déjà */
		if(isset($roleuser[$roleName])) {

			/* On ajoute un utilisateur au sous-tableau correspondant */
			$roleuser[$roleName]['user'][] = $currentRow['email'];

		} else {
			/* Le sous-tableau roleName n'existe pas */
			/* On donne le 'slug' du role comme clé du tableau */
			$roleuser[$roleName]['roleFR'] = $currentRow['FrName'];
			
			/* Initialisation du sous-tableau d'utilisateurs */
			$roleuser[$roleName]['user'] = array();
			/* Ajout d'un utilisateur */
			$roleuser[$roleName]['user'][] = $currentRow['email'];
		}
	}

	/*
		Exemple de rendu de tableau :

		Array
		(
		    ['ADMIN'] => Array
		        (
		            ['roleFR'] => Administrateur
		            ['user'] => Array
		                (
		                    [0] => mk@plop.net
		                    [1] => test@test.fr
		                )

		        )

		    ['EDITOR'] => Array
		        (
		            ['roleFR'] => Éditeur de contenu
		            ['user'] => Array
		                (
		                    [0] => 
		                )

		        )

		)
	*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Utilisateurs</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<a href="../../inc/add_user.php">Ajouter un utilisateur</a>
	<?php foreach($roleuser as $currentRole) : ?>
		<article class="role">
			<header>
				<h1><?php echo $currentRole['roleFR']; ?></h1>
			</header>
			<section class="user">
				<ul>
				<?php foreach($currentRole['user'] as $currentUser) : ?>
					<?php if(!empty($currentUser)) : ?>
					<li>
						<?php echo $currentUser; ?>
					</li>
					<?php else : /* Si le tableau existe, mais sans utilisateur associé */ ?>
						Aucun utilisateur.
					<?php endif; ?>
				<?php endforeach; ?>
				</ul>
			</section>
		</article>
	<?php endforeach; ?>
	<a href="../../inc/add_user.php">Ajouter un utilisateur</a>
</body>
</html>