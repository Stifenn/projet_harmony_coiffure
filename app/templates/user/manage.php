<?php $this->layout('layoutBack', ['title' => 'Gestion des utilisateurs']) ?>

<?php $this->start('main_content') ?>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<table class="table table-striped">
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
								<a href="<?= $this->url('user_delete', ['id' => $user['id']]) ?>"><button type="button" class="btn btn-danger"  class="delete-account">Supprimer</button></a>
						<?php endif; endif; ?>
				</td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
</div>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		
		<h4>Créer un compte</h4>
		<form class="form-horizontal" action="<?= $this->url('user_create') ?>" method="POST">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="nom">Nom</label>
				<div class="col-sm-10">
					<input class="form-control" id="nom" type="text" name="nom" placeholder="Nom" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="prenom">Prénom</label>
				<div class="col-sm-10">
					<input class="form-control" id="prenom" type="text" name="prenom" placeholder="Prénom" required />
				</div>
			</div>
			<span id="staff" hidden>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="email">Email</label>
					<div class="col-sm-10">
						<input class="form-control" type="email" name="email" placeholder="Email" id="email" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="password">Mot de passe</label>
					<div class="col-sm-10">
						<input class="form-control" type="password" name="password" placeholder="Mot de passe" id="password" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="password-confirm">Confirmer le mot de passe</label>
					<div class="col-sm-10">
						<input class="form-control" type="password" name="password-confirm" placeholder="Confirmer le mot de passe" id="password-confirm" />
					</div>
				</div>
			</span>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<select class="form-control" name="role" id="select-role">
						<option value="client">Client</option>
						<?php
							// si on est l'admin on peut créer un compte employé (staff) sinon juste un compte client
							if ($_SESSION['user']['role'] == 'admin') : ?>
								<option value="staff">Employé</option>
								<?php endif; ?>
					</select>
				</div>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-primary" value="Ajouter">
			</div>
		</form>
	</div>
</div>



<?php $this->stop('main_content') ?>
