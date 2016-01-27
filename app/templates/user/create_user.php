<?php $this->layout('layout', ['title' => 'Création d\'un compte']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($errorPass)) : ?>
<div>
	Les 2 mots de passe ne correpondent pas !
</div>
<?php endif ?>
<p>
	Avez-vous un numéro de client ? (compte créer directement au salon,
	on vous a donnée une carte de visite avec ce numéro ou contactez nous : XX XX XX XX XX)	
</p>
<label><input type="radio" name="choix" value="oui" class="choix" />Oui</label>
<label><input type="radio" name="choix" value="non" class="choix" />Non</label>

<div id="recup-compte" hidden>
	<p>Récupérer votre compte</p>
	<form action="<?= $this->url('recup_user') ?>" method="POST">
		<input type="text" name="num-client" placeholder="Numéro de client" required>
		<input type="text" name="nom" placeholder="Nom" required>
		<input type="text" name="prenom" placeholder="Prénom" required>
		<input type="submit" name="recup-user" value="Valider">
	</form>
</div>

<div id="create-compte" hidden>
	<p>Créer un nouveau compte</p>
	<form action="<?= $this->url('create_user') ?>" method="POST">
		<input type="text" name="nom" placeholder="Nom" required>
		<input type="text" name="prenom" placeholder="Prénom" required>
		<input type="text" name="email" placeholder="Email" required>
		<input type="password" name="password" placeholder="Mot de passe" required>
		<input type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required>
		<input type="submit" name="create-user" value="Créer un compte">
	</form>

</div>

<a href="<?= $this->url('home') ?>">Retouner à l'accueil</a>
<?php $this->stop('main_content') ?>