<?php $this->layout('layoutBack', ['title' => 'Recherche d\'un utlisateur']) ?>

<?php $this->start('main_content') ?>
	
	<form class="form-horizontal" action="<?= $this->url('recherche')?>" method="post" accept-charset="utf-8">
		<div class="form-group">
			<label for="num-client" class="col-sm-2 control-label">Recherche client</label>
			<div class="col-sm-10">
				<input class="form-control" id="name" type="text" name="name" placeholder="Recherche">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-default" type="submit" name="search" value="Recherche">
			</div>
		</div>
	</form>


	<?php if(isset($recherche)) : ?>
		<?php foreach($recherche as $currentRecherche) : ?>
			<div class="col-sm-offset-2 col-sm-10">
				<li><a href="<?= $this->url('fiche_client', ['id' => $currentRecherche['id']])?>"><?= $currentRecherche['nom']?> <?= $currentRecherche['prenom'] ?></a></li>
			</div>
		<?php endforeach ?>
	<?php endif ?>	

<?php $this->stop('main_content') ?>