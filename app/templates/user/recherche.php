<?php $this->layout('layoutBack', ['title' => 'Recherche d\'un utlisateur']) ?>

<?php $this->start('main_content') ?>
	
	<form action="<?= $this->url('recherche')?>" method="post" accept-charset="utf-8">
		<input type="text" name="name" value="" placeholder="Recherche">
		<input type="submit" name="search" value="Recherche">
	</form>


<?php foreach($recherche as $currentRecherche) : ?>
	<li><a href=""><?= $currentRecherche['nom']?> <?= $currentRecherche['prenom'] ?></a></li>
<?php endforeach ?>	


<?php $this->stop('main_content') ?>