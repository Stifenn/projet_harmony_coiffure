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
		<?php
		// on n'affiche pas le compte admin
		if ($user['role'] != 'admin') : ?>
		<td><?= $user['nom'] ?></td>
		<td><?= $user['prenom'] ?></td>
		<td><?= $user['email'] ?></td>
		<td><?= $user['role'] ?></td>
		<td>
		<?php endif; ?>
			<?php
				// seul l'admin peut supprimer des comptes
				if ($_SESSION['user']['role'] == 'admin') : ?>
					<a href="<?= $this->url('user_delete', ['id' => $user['id']]) ?>">Supprimer</a>
			 <?php endif; ?>
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
<?php endif; ?>

<form action="<?= $this->url('user_create') ?>" method="POST">
	<input type="text" name="nom" placeholder="Nom" required />
	<input type="text" name="prenom" placeholder="Prénom" required />
	<input type="email" name="email" placeholder="Email" />
	<input type="password" name="password" placeholder="Mot de passe" />
	<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" />
	<select name="role">
		<option value="client">Client</option>
		<?php
			// si on est l'admin on peut créer un compte employé (staff) sinon juste un compte client
			if ($_SESSION['user']['role'] == 'admin') : ?>
		<option value="staff">Employé</option>
		<?php endif; ?>
	</select>
	<input type="submit" value="Ajouter">
</form>


<a href="<?= $this->url('admin') ?>">Retour à l'accueil de gestion</a>

<?php $this->stop('main_content') ?>
