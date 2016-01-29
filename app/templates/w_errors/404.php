<?php $this->layout('layout', ['title' => 'Cette page n\'existe pas !']) ?>

<?php $this->start('main_content'); ?>
<p>Il n'y a tien à voir ici !</p>
<hr>
<div class="col-sm-offset-2 col-sm-10">
	<a href="<?= $this->url('home') ?>">Retourner à l'accueil</a>
</div>
<?php $this->stop('main_content'); ?>
