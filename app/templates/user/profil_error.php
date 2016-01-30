<?php $this->layout('layout', ['title' => 'Erreur modification du profil']) ?>

<?php $this->start('main_content') ?>
	
<?php
	// si les 2 mots de passe ne correpondent pas
	if(isset($errorNewPass)) : ?>
		<div class="bg-danger col-md-offset-2 col-md-10">
			<p>Les 2 mots de passe ne correpondent pas !</p>
		</div>
	<?php endif; ?>
	<?php 
	// si l'utilisateur s'est trompé dans son mot de passe
	if(isset($errorPass)) : ?>
		<div class="bg-danger col-md-offset-2 col-md-10">
			<p>Mot de passe incorrect !</p>
		</div>
	<?php endif; ?>

	<div class="col-sm-offset-2 col-sm-10">
		<a href="<?= $this->url('profil') ?>">Retour au profil</a>
	</div>

<?php $this->stop('main_content') ?>