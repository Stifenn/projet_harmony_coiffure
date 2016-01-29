<?php $this->layout('layout', ['title' => 'Erreur modification du profil']) ?>

<?php $this->start('main_content') ?>
	
<?php
	// si les 2 mots de passe ne correpondent pas
	if(isset($errorNewPass)) : ?>
		<div>
			Les 2 mots de passe ne correpondent pas !
		</div>
	<?php endif; ?>
	<?php 
	// si l'utilisateur s'est trompé dans son mot de passe
	if(isset($errorPass)) : ?>
		<div>
			Mot de passe incorrect !
		</div>
	<?php endif; ?>

	<a href="<?= $this->url('profil') ?>">Retour au profil</a>

<?php $this->stop('main_content') ?>