<?php $this->layout('layout', ['title' => 'Création d\'un compte']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($errorPass)) : ?>
<div>
	Les 2 mots de passe ne correpondent pas !
</div>
<?php endif ?>

<form action="<?= $this->url('create_user') ?>" method="POST">
	<input type="text" name="nom" placeholder="Nom" required>
	<input type="text" name="prenom" placeholder="Prénom" required>
	<input type="text" name="email" placeholder="Email" required>
	<input type="password" name="password" placeholder="Mot de passe" required>
	<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required>
	<input type="submit" name="create-user" value="Ajouter">
</form>


<a href="<?= $this->url('home') ?>">Retouner à l'accueil</a>
<?php $this->stop('main_content') ?>