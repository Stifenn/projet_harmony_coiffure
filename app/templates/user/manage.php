<?php $this->layout('layoutBack', ['title' => 'Gestion des utilisateurs']) ?>

<?php $this->start('main_content') ?>

<table>
	<tr>
		<th>Numéro client</th>
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
			<td><?= $user['id'] ?></td>
			<td><?= $user['nom'] ?></td>
			<td><?= $user['prenom'] ?></td>
			<td><?= $user['email'] ?></td>
			<td><?= $user['role'] ?></td>
			<td>
		<?php endif; ?>
			<?php
				if ($user['role'] != 'admin') :
					// seul l'admin peut supprimer des comptes
					if ($_SESSION['user']['role'] == 'admin') : ?>
						<a href="<?= $this->url('user_delete', ['id' => $user['id']]) ?>"><button type="button" class="delete-account">Supprimer</button></a>
				<?php endif; endif; ?>
		</td>
	</tr>
<?php endforeach ?>
</table>
<p class="bg-primary">Créer un compte</p>
<form action="<?= $this->url('user_create') ?>" method="POST">
	<label for="nom">Nom</label>
	<input id="nom" type="text" name="nom" placeholder="Nom" required />

	<label for="prenom">Prénom</label>
	<input id="prenom" type="text" name="prenom" placeholder="Prénom" required />

	<span id="staff" hidden>
		<label for="email">Email</label>
		<input type="email" name="email" placeholder="Email" id="email" />

		<label for="password">Mot de passe</label>
		<input type="password" name="password" placeholder="Mot de passe" id="password" />

		<label for="password-confirm">Confirmer le mot de passe</label>
		<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" id="password-confirm" />
	</span>
	<select name="role" id="select-role">
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
