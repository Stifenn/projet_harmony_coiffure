<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
	
<?php
	// si l'email ou le mot de passe est faux
	if(isset($errorConnection)) : ?>
		<p class="bg-danger col-md-offset-2 col-md-10">
			Email ou mot de passe incorrect !
		</p>
<?php endif ?>
<hr>
	<form class="form-horizontal" method="POST">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="email-input">Email</label>
			<div class="col-sm-10">
				<input class="form-control" type="email" name="email" id="email-input" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-input">Mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" name="password" id="password-input" placeholder="Mot de passe" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-default" name="login-submit" type="submit">Connexion</button>
			</div>
		</div>
	</form>
	<hr>
	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="checkbox" id="checkboxlost" /> Mot de passe perdu ?
				</label>
			</div>
		</div>
	</div>
		<form class="form-horizontal" action="<?= $this->url('lost_password') ?>" method="POST" hidden id="lost-pass">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email-recup">Votre Email</label>
				<div class="col-sm-10">
					<input class="form-control" id="email-recup" type="email" name="email" placeholder="Votre Email" required>
					<span id="helpBlock" class="help-block">Vous recevrez par email un lien pour changer votre mot de passe</span>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" name="lost-submit" type="submit">Envoyer</button>
				</div>
			</div>
		</form>
		<hr>
	<div class="col-sm-offset-2 col-sm-10">
		<a href="<?= $this->url('home') ?>">Retour accueil</a>
	</div>
<?php $this->stop('main_content') ?>