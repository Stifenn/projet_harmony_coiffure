<?php $this->layout('layoutBack', ['title' => 'Votre profil']) ?>

<?php $this->start('main_content') ?>
	<p>Votre nom : <?= $user['nom'] ?></p>
	<p>Votre prénom : <?= $user['prenom'] ?></p>
	<p>Votre email : <?= $user['email'] ?></p>
	<br>
	<hr>

	<h4>Voulez-vous modifier votre profil ? <em>(vous pouvez modifier une ou plusieurs données à la fois)</em></h4>
	<form class="form-horizontal" action="<?= $this->url('update_user_team', ['id' => $user['id']]) ?>" method="POST">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="nom">Nom</label>
			<div class="col-sm-10">
				<input class="form-control" id="nom" type="text" name="nom" value="<?= $user['nom'] ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"for="prenom">Prénom</label>
			<div class="col-sm-10">
				<input class="form-control" id="prenom" type="text" name="prenom" value="<?= $user['prenom'] ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">Email</label>
			<div class="col-sm-10">
				<input class="form-control" id="email" type="email" name="email" value="<?= $user['email'] ?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-new">Nouveau mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password-new" type="password" name="password-new" placeholder="Nouveau mot de passe" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-new-confirm">Confirmez votre nouveau mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password-new-confirm" type="password" name="password-new-confirm" placeholder="Confirmez votre nouveau mot de passe" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Votre mot de passe actuel</label>
			<div class="col-sm-10">
				<input class="form-control" id="password" type="password" name="password" placeholder="Votre mot de passe actuel" require />
				<span id="helpBlock" class="help-block">Obligatoire pour valider les modifications</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-default" type="submit" value="Mettre à jour" />
			</div>
		</div>
	</form>

<?php $this->stop('main_content') ?>