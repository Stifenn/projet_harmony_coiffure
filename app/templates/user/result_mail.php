<?php $this->layout('layout', ['title' => 'Envoi de l\'email']) ?>

<?php $this->start('main_content') ?>
	<hr>
<?php
	// si echec de l'envoi de l'email
	if(isset($errorMail)) : ?>
		<div>
			Echec de l'envoi du message !
		</div>
	<?php endif;

	// si succes de l'envoi de l'email
	if(isset($sentMail)) : ?>
		<div>
			Message envoyé !
		</div>
	<?php endif; ?>
	
	<hr>
<a href="<?= $this->url('home') ?>">Retour à l'accueil</a>

<?php $this->stop('main_content') ?>