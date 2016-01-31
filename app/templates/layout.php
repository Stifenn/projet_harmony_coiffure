<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->e($title) ?></title>
<!-- 	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
 -->	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleUser.css') ?>">
</head>
<body>
	<button class="btn btn-default" id="control" type="button">
		<span id="glyph-left" class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		<span id="glyph-right" class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
	</button>
	<div id="user">
	<?php
		// Si il n'y a pas de session active j'affiche les lien de connexion et de création de compte
		if (!isset($_SESSION['user'])) : ?>
			<a href="<?= $this->url('login') ?>">Se connecter</a> | 
			<a href="<?= $this->url('create_user') ?>">Créer un compte</a>
	<?php endif; ?>

	<?php
		// si la session est active
		if(isset($_SESSION['user'])) :
			// on affiche le prenom et l'email de l'utilisateur ?>
				<strong><?= $_SESSION['user']['prenom'] ?></strong>
				<br>
				(<em><?= $_SESSION['user']['email'] ?></em>)<br>
				<?php
					// si on est admin ou un employé, on affiche un lien vers la gestion
					if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'staff') : ?>
						<a href="<?= $this->url('admin') ?>">Gestion</a> | 
					<?php else : ?>
				<!-- si on est connecté on propose un lien profil pour les clients et déconnexion pour tous -->
						<a href="<?= $this->url('profil') ?>">Profil</a> |
					<?php endif ?> 
				<a href="<?= $this->url('logoff') ?>">Déconnexion</a>
	<?php endif; ?>
	</div>
	<div class="container">
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
	<script src="<?= $this->assetUrl('js/jquery-2.2.0.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>" type="text/javascript" charset="utf-8"></script>
</body>
</html>