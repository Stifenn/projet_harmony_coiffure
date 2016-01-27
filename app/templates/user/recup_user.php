<?php $this->layout('layout', ['title' => 'Récupération d\'un compte']) ?>

<?php $this->start('main_content') ?>


<form action="<?= $this->url('update_recup_user', ['id' => $currentUser['id']]) ?>" method="POST">
	<input type="text" name="nom" value="<?= $currentUser['nom'] ?>" required />
	<input type="text" name="prenom" value="<?= $currentUser['prenom'] ?>" required />
	<input type="email" name="email" placeholder="Email" required />
	<input type="password" name="password" placeholder="Mot de passe" required />
	<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required>
	<input type="submit" name="update-recup-user" value="Valider" />
</form>

<a href="<?= $this->url('home') ?>">Retouner à l'accueil</a>

<?php $this->stop('main_content') ?>