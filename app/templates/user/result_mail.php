<?php $this->layout('layout', ['title' => 'Envoi de l\'email']) ?>

<?php $this->start('main_content') ?>
	<hr>
<?php
	// si echec de l'envoi de l'email
	if(isset($errorMail)) : ?>
		<div class="bg-danger col-md-offset-2 col-md-10">
			<p>Echec de l'envoi du message ! Il y a eu une erreur du serveur.</p>
			<p>Merci de réessayer plus tard.</p>
		</div>
	<?php endif;

	// si succes de l'envoi de l'email
	if(isset($sentMail)) : ?>
		<div class="col-md-offset-2 col-md-10">
			<p>Message envoyé !</p>
			<p>Regarder dans votre boîte mail.</p>
		</div>
	<?php endif; ?>
	
	<hr>
<a href="<?= $this->url('home') ?>">Retour à l'accueil</a>

<?php $this->stop('main_content') ?>