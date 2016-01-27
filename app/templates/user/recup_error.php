<?php $this->layout('layout', ['title' => 'Erreur modification du profil']) ?>

<?php $this->start('main_content') ?>
	
<?php
	// si les 2 mots de passe ne correpondent pas
	if(isset($errorPass)) : ?>
		<div>
			Les 2 mots de passe ne correpondent pas !
		</div>
	<?php endif; ?>
	

	<a href="<?= $this->url('create_user') ?>">Retour</a>

<?php $this->stop('main_content') ?>