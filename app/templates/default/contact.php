<?php

$this->layout('layout', ['title' => 'Contact']); ?>

<?php $this->start('main_content'); ?>

	<h1>Contactez-nous !</h1>

	<?php if(isset($errorInput)) : ?>
		<div>
			Merci de renseigner tous les champs !
		</div>
	<?php endif; ?>

	<form action="<?= $this->url('contact') ?>" method="POST" accept-charset="utf-8">
		<div class="form-group">
			<label for="email">Votre email</label>
			<input class="form-control" id="email" type="email" name="email" value="<?php if(isset($_SESSION['user'])) : ?><?= $_SESSION['user']['email'] ?><?= 'readonly' ?><?php endif; ?>" placeholder="Email" />
		</div>
		<div class="form-group">
			<label for="nom">Votre nom</label>
			<input class="form-control" id="nom" type="text" name="nom" value="<?php if(isset($_SESSION['user'])) : ?><?= $_SESSION['user']['nom'] ?><?php endif; ?>" placeholder="Nom" />
		</div>
		<div class="form-group">
			<label for="sujet">Sujet</label>
			<input class="form-control" id="sujet" type="text" name="sujet" placeholder="Sujet" />
		</div>
			<label for="message">Votre message</label>
			<textarea class="form-control" rows="3" id="message" name="message" placeholder="Votre message ici !"></textarea>
			<button class="btn btn-default" type="submit" name="submit-message">Envoyer</button>
	</form>

<a href="<?= $this->url('home') ?>">Accueil</a>
<?php $this->stop('main_content'); ?>