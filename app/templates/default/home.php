<?php $this->layout('layoutFront', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>

	<h2>Accueil Front</h2>

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
		<div id="user">
			<?= $_SESSION['user']['nom'] ?> (<em><?= $_SESSION['user']['email'] ?></em>)<br>
			<?php
				// si on est admin ou un employé, on affiche un lien vers la gestion
				if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'staff') : ?>
					<a href="<?= $this->url('admin') ?>">Gestion</a> | 
				<?php endif;
				// si on est connecté on propose un lien son profil et de déconnexion ?>
			<a href="<?= $this->url('profil') ?>">Profil</a> | 
			<a href="<?= $this->url('logoff') ?>">Déconnexion</a>
		</div>
<?php endif; ?>

<?php $this->stop('main_content') ?>

<?php $this->start('show_image_lookbook') ?>

	<?php foreach ($show_lookbook as $currentLookbook) : ?>
					<div class="image_lookbook">
						<a class="fancybox" rel="gallery" data-title-id="title-<?= $currentLookbook['numero'] ?>"  href="<?= $this->assetUrl($currentLookbook['chemin']) ?>">
							<img src="<?= $this->assetUrl($currentLookbook['chemin']) ?>"  alt="<?= $currentLookbook['label'] ?>" value="<?= $currentLookbook['numero'] ?>">
						</a>
					</div>
	<?php endforeach ?>

<?php $this->stop('show_image_lookbook') ?>