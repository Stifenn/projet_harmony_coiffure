<?php $this->layout('layoutBack', ['title' => 'Recherche d\'un utlisateur']) ?>

<?php $this->start('main_content') ?>
	
	<form action="<?= $this->url('recherche')?>" method="post" accept-charset="utf-8">
		<input type="text" name="name" value="" placeholder="Recherche">
		<input type="submit" name="search" value="Recherche">
	</form>


	<?php if(isset($recherche)) : ?>
		<?php foreach($recherche as $currentRecherche) : ?>
			<li><a href="<?= $this->url('fiche_client', ['id' => $currentRecherche['id']])?>"><?= $currentRecherche['nom']?> <?= $currentRecherche['prenom'] ?></a></li>
		<?php endforeach ?>
	<?php endif ?>	


<?php $this->stop('main_content') ?>