<?php $this->layout('layout', ['title' => 'Gestion des utilisateurs']) ?>

<?php $this->start('main_content') ?>

<form action="<?= $this->url('user_create') ?>" method="POST" id="create-user">
	<input placeholder="Nom" type="text" name="nom" required>
	<input placeholder="Prénom" type="text" name="prenom" required>
	<input placeholder="E-mail" type="text" name="email" required>
	<input placeholder="Mot de passe" type="password" name="password" required>
	<input type="submit" value="Ajouter">
</form>


<a href="<?= $this->url('home') ?>">Retour accueil</a>
<?php $this->stop('main_content') ?>