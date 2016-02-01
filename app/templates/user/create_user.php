<?php $this->layout('layout', ['title' => 'Création d\'un compte']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($errorPass)) : ?>
	<p class="bg-danger col-md-offset-2 col-md-10">
		Les 2 mots de passe ne correpondent pas !
	</p>
	<?php endif ?>
	<div class="col-md-offset-2 col-md-10">
		<p><strong>Avez-vous un numéro de client ?</strong></p>
		<span class="help-block">(compte créer directement au salon, on vous a donné
		une carte de visite avec ce numéro ou contactez nous : 03 82 21 75 78)
		</span>
	</div>
	<div class="radio row col-md-offset-2 col-md-10">
		<label><input type="radio" name="choix" value="oui" class="choix" />Oui</label>
		<label><input type="radio" name="choix" value="non" class="choix" />Non</label>
	</div>

	<div id="recup-compte" hidden>
		<h4>Récupérer votre compte</h4>
		<form class="form-horizontal" action="<?= $this->url('recup_user') ?>" method="POST">
			<div class="form-group">
				<label for="num-client" class="col-sm-2 control-label">Numéro de client</label>
				<div class="col-sm-10">
					<input class="form-control" id="num-client" type="text" name="num-client" placeholder="Numéro de client" required />
				</div>
			</div>
			<div class="form-group">
				<label for="nom-client" class="col-sm-2 control-label">Nom</label>
				<div class="col-sm-10">
					<input class="form-control" id="nom-client" type="text" name="nom" placeholder="Nom" required />
				</div>
			</div>
			<div class="form-group">
				<label for="prenom-client" class="col-sm-2 control-label">Prénom</label>
					<div class="col-sm-10">
						<input class="form-control" id="prenom-client" type="text" name="prenom" placeholder="Prénom" required />
						<span class="help-block">Tous les champs sont obligatoires</span>
					</div>
			</div>
				<div class="form-group">
	   				<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-default" type="submit" name="recup-user">Valider</button>
					</div>
				</div>
		</form>
		<hr>
	</div>

	<div id="create-compte" hidden>
		<h4>Créer un nouveau compte</h4>
		<form class="form-horizontal" action="<?= $this->url('create_user') ?>" method="POST">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="nom">Nom</label>
				<div class="col-sm-10">
					<input id="nom" class="form-control" type="text" name="nom" placeholder="Nom" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="prenom">Prénom</label>
				<div class="col-sm-10">	
					<input id="nom" class="form-control" type="text" name="prenom" placeholder="Prénom" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">Email</label>
				<div class="col-sm-10">
					<input id="email" class="form-control" type="text" name="email" placeholder="Email" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">Mot de passe</label>
				<div class="col-sm-10">
					<input id="password" class="form-control" type="password" name="password" placeholder="Mot de passe" required />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="email">Confirmer le mot de passe</label>
				<div class="col-sm-10">
					<input id="password-confirm" class="form-control" type="password" name="password-confirm" placeholder="Confirmer le mot de passe" required />
					<span class="help-block">Tous les champs sont obligatoires</span>
				</div>
			</div>
			<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
					<input class="btn btn-default" type="submit" name="create-user" value="Créer un compte" />
				</div>
			</div>
		</form>
		<hr>
	</div>
	<div class="col-sm-offset-2 col-sm-10">
		<a href="<?= $this->url('home') ?>">Retouner à l'accueil</a>
	</div>

<?php $this->stop('main_content') ?>