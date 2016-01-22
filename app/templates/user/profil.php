<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
	<h2>Votre profil</h2>
	<p>Votre nom : <?= $user['nom'] ?></p>
	<p>Votre prénom : <?= $user['prenom'] ?></p>
	<p>Votre email : <?= $user['email'] ?></p>
	<br>
	
	Voulez-vous modifier votre profil ? (vous pouvez modifier une ou plusieurs données)
	<form action="<?= $this->url('update_user', ['id' => $user['id']]) ?>" method="POST">
		<input type="text" name="nom" value="<?= $user['nom'] ?>" />
		<input type="text" name="prenom" value="<?= $user['prenom'] ?>" />
		<input type="email" name="email" value="<?= $user['email'] ?>"/>
		<input type="password" name="password-new" placeholder="Nouveau mot de passe" />
		<input type="password" name="password-new-confirm" placeholder="Confirmez votre nouveau mot de passe" id="password" />
		<input type="password" name="password" placeholder="Votre mot de passe actuel" require />
		<input type="submit" value="Mettre à jour" />
	</form>
	<?php
		// formulaire de suppression du compte par l'utilisation (client) seulement
		if ($_SESSION['user']['role'] == 'client') : ?>
			<form action="<?= $this->url('delete_user', ['id' => $user['id']]) ?>" method="POST">
				<input type="password" name="password-client" placeholder="Votre mot de passe actuel" require />
				<input type="submit" id="delete-client" value="Supprimer" />
			</form>
	<?php endif; ?>
	<a href="<?= $this->url('home') ?>">Retour à l'accueil</a>

<?php $this->stop('main_content') ?>