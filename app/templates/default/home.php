<?php $this->layout('layout', ['title' => 'Accueil !']) ?>

<?php $this->start('div_fixe') ?>
	<button class="btn btn-default" id="control" type="button">
		<span id="glyph-left" class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		<span id="glyph-right" class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
	</button>
	<div id="user">
	<?php
		// Si il n'y a pas de session active j'affiche le lien de connexion
		if (!isset($_SESSION['user'])) : ?>
			<a href="<?= $this->url('login') ?>">Se connecter</a> | 
			<a href="<?= $this->url('create_user') ?>">Créer un compte</a>
	<?php endif; ?>

	<?php
		// si la session est active
		if(isset($_SESSION['user'])) :
			// on affiche le nom et l'email de l'utilisateur ?>
				<?= $_SESSION['user']['nom'] ?>
				<br>
				(<em><?= $_SESSION['user']['email'] ?></em>)<br>
				<?php
					// si on est admin ou un employé, on affiche un lien vers la gestion
					if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'staff') : ?>
						<a href="<?= $this->url('admin') ?>">Gestion</a> | 
					<?php endif;
				// si on est connecté on propose un lien son profil et de déconnexion ?>
				<a href="<?= $this->url('profil') ?>">Profil</a> | 
				<a href="<?= $this->url('logoff') ?>">Déconnexion</a>
	<?php endif; ?>
	</div>

<?php $this->stop('div_fixe') ?>
