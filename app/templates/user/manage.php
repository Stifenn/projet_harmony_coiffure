<?php $this->layout('layoutBack', ['title' => 'Gestion des utilisateurs']) ?>

<?php $this->start('main_content') ?>

<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th>
		<th>Role</th>
		<th></th>
	</tr>
<?php foreach($users as $user) : ?>
	<tr>
		<td><?= $user['nom'] ?></td>
		<td><?= $user['prenom'] ?></td>
		<td><?= $user['email'] ?></td>
		<td><?= $user['role'] ?></td>
		<td>
			<a href="<?= $this->url('user_delete', ['id' => $user['id']]) ?>">Supprimer</a>
		</td>
	</tr>
<?php endforeach ?>
</table>

<?php 
	// si les 2 mots de passe ne correpondent pas
	if(isset($errorPass)) : ?>
		<div>
			Les 2 mots de passe ne correpondent pas !
		</div>
<?php endif ?>

<form action="<?= $this->url('user_create') ?>" method="POST" id="create-user">
	<input type="text" name="nom" placeholder="Nom" required>
	<input type="text" name="prenom" placeholder="prenom" required>
	<input type="email" name="email" placeholder="email" required>
	<input placeholder="Mot de passe" type="password" name="password" required>
	<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required>
	<select name="role">
		<option value="staff">Employé</option>
		<option value="admin">Administrateur</option>
	</select>
	<input type="submit" value="Ajouter">
</form>


<a href="<?= $this->url('admin') ?>">Retour à l'accueil de gestion</a>

<?php $this->stop('main_content') ?>
