<?php $this->layout('layout', ['title' => 'Accès interdit']) ?>

<?php $this->start('main_content'); ?>

<div class="col-sm-offset-2 col-sm-10">
	<h1>Il n'y a tien à voir ici !</h1>
</div>
<div class="col-sm-offset-2 col-sm-10">
	<a href="<?= $this->url('home') ?>">Retourner à l'accueil</a>
</div>

<?php $this->stop('main_content'); ?>
