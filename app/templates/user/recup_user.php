<?php $this->layout('layout', ['title' => 'Récupération d\'un compte']) ?>

<?php $this->start('main_content') ?>


<form class="form-horizontal" action="<?= $this->url('update_recup_user', ['id' => $currentUser['id']]) ?>" method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="nom">Nom</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" id="nom" name="nom" value="<?= $currentUser['nom'] ?>" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="prenom">Prénom</label>
		<div class="col-sm-10">
			<input class="form-control" id="prenom" type="text" name="prenom" value="<?= $currentUser['prenom'] ?>" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="email">Email</label>
		<div class="col-sm-10">
			<input class="form-control" id="email" type="email" name="email" placeholder="Email" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="password">Mot de passe</label>
		<div class="col-sm-10">
			<input class="form-control" id="password" type="password" name="password" placeholder="Mot de passe" required />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="password-confirm">Confirmer le mot de passe</label>
		<div class="col-sm-10">
			<input class="form-control" id="password-confirm" type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-default" type="submit" name="update-recup-user" value="Valider" />
		</div>
	</div>
</form>

<a href="<?= $this->url('home') ?>">Retouner à l'accueil</a>

<?php $this->stop('main_content') ?>