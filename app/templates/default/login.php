<?php $this->layout('layout', ['title' => 'Connexion']) ?>
<?php $this->start('main_content') ?>
	
<?php
	// si l'email ou le mot de passe est faux
	if(isset($errorConnection)) : ?>
		<div>
			Email ou mot de passe incorrect !
		</div>
<?php endif ?>

<form method="POST">
	<h2>Connexion</h2>
	<input type="email" name="email" id="email-input" placeholder="Email" required>
	<input type="password" name="password" id="password-input" placeholder="Password" required>
	<button name="login-submit" type="submit">Connexion</button>
</form>
<a href="<?= $this->url('home') ?>">Retour accueil</a>
<?php $this->stop('main_content') ?>