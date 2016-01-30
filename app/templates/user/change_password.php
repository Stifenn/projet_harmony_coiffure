<?php $this->layout('layout', ['title' => 'Changement de mot de passe']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($errorToken)) : ?>
	<div class="col-sm-offset-2 col-sm-10 bg-danger">
		<p>Il y a une erreur dans l'url ou vous ne pouvez pas faire cela !</p>
		<br>
		<a href="<?= $this->url('home') ?>">Retour à l'accueil</a>
	</div>
	<?php endif ?>

	<?php if(isset($errorPass)) : ?>
	<div class="col-sm-offset-2 col-sm-10">
		<p class="bg-danger">Les 2 mots de passe sont différents, veuillez recommencer !</p>
	</div>
	<?php endif ?>

	<form class="form-horizontal" action="<?= $this->url('change_password', ['token' => $token]) ?>" method="POST" <?php
		if(isset($errorToken)) : ?>
			<?= 'hidden' ?>
		<?php endif ?>>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password" type="password" name="password" placeholder="Mot de passe" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-confirm">Confirmer le mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password-confirm" type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-default" type="submit" name="change-password" value="Valider" />
			</div>
		</div>
	</form>

<?php $this->stop('main_content') ?>