<?php $this->layout('layout', ['title' => 'Votre profil']) ?>

<?php $this->start('main_content') ?>
	<p>Votre nom : <?= $user['nom'] ?></p>
	<p>Votre prénom : <?= $user['prenom'] ?></p>
	<p>Votre email : <?= $user['email'] ?></p>
	<br>
	<hr>
	<h4>Vos prestations</h4>
	<?php
		if ( isset($fiche) && !empty($fiche) && !empty($fiche[0]['date']) ) : ?>
			<div class="row">
  				<div class="col-md-6 col-md-offset-3"> 
					<table class="table table-striped table-hover">
			  			<thead>
			    			<tr class="success control-label">
					      		<th>Date</th>
					      		<th>Description</th>
					   	 	</tr>
					 	</thead>
			  			<tbody>
			      		<?php foreach($fiche as $currentFiche) : ?>
			      			<tr class="warning">
			      				<td><?=$currentFiche['date']?></td>
			      				<td><?=$currentFiche['description']?></td>
							</tr>
			      		<?php endforeach ?>
			  			</tbody>
					</table>
				</div>
			</div>	
		<?php else : ?>
			<div class="row">
				<div class="form-group col-sm-offset-2 col-sm-10">
					<p>Vous n'avez pas encore effectuer de prestation chez nous !</p>
				</div>
			</div>
		<?php endif ?>
	<hr>
	<h4>Voulez-vous modifier votre profil ? <em>(vous pouvez modifier une ou plusieurs données à la fois)</em></h4>
	<form class="form-horizontal" action="<?= $this->url('update_user', ['id' => $user['id']]) ?>" method="POST">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="nom">Nom</label>
			<div class="col-sm-10">
				<input class="form-control" id="nom" type="text" name="nom" value="<?= $user['nom'] ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"for="prenom">Prénom</label>
			<div class="col-sm-10">
				<input class="form-control" id="prenom" type="text" name="prenom" value="<?= $user['prenom'] ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="email">Email</label>
			<div class="col-sm-10">
				<input class="form-control" id="email" type="email" name="email" value="<?= $user['email'] ?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-new">Nouveau mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password-new" type="password" name="password-new" placeholder="Nouveau mot de passe" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password-new-confirm">Confirmez votre nouveau mot de passe</label>
			<div class="col-sm-10">
				<input class="form-control" id="password-new-confirm" type="password" name="password-new-confirm" placeholder="Confirmez votre nouveau mot de passe" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Votre mot de passe actuel</label>
			<div class="col-sm-10">
				<input class="form-control" id="password" type="password" name="password" placeholder="Votre mot de passe actuel" require />
				<span id="helpBlock" class="help-block">Obligatoire pour valider les modifications</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-default" type="submit" value="Mettre à jour" />
			</div>
		</div>
	</form>
	<?php
		// formulaire de suppression du compte par l'utilisation (client) seulement
		if ($_SESSION['user']['role'] == 'client') : ?>
			<hr>
			<h4>Voulez-vous <strong>supprimer</strong> votre compte ?</h4>
			<form class="form-horizontal" action="<?= $this->url('delete_user', ['id' => $user['id']]) ?>" method="POST">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="password-client">Votre mot de passe actuel</label>
					<div class="col-sm-10">
						<input class="form-control" id="password-client" type="password" name="password-client" placeholder="Votre mot de passe actuel" require />
						<span id="helpBlock1" class="help-block">Obligatoire pour valider la suppression de votre compte</span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input class="btn btn-danger" type="submit" id="delete-client" value="Supprimer" />
					</div>
				</div>
			</form>
	<?php endif; ?>
	<div class="col-sm-offset-2 col-sm-10">
		<a href="<?= $this->url('home') ?>">Retour à l'accueil</a>
	</div>

<?php $this->stop('main_content') ?>