<?php $this->layout('layout', ['title' => 'Cette page n\'existe pas !']) ?>

<?php $this->start('main_content'); ?>

<div class="col-sm-offset-2 col-sm-10">
	<h1>Vous avez du faire une erreur !</h1>
</div>
<div class="col-sm-offset-2 col-sm-10">
	<a href="<?= $this->url('home') ?>">Retourner à l'accueil</a>
</div>
<?php $this->stop('main_content'); ?>
