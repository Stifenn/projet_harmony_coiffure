<?php $this->layout('layoutBack', ['title' => 'Admin']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	
	<a href="<?= $this->url('slider') ?>">Slider</a><br>
	<a href="<?= $this->url('lookbook') ?>">Lookbook</a>
	
<?php $this->stop('main_content') ?>
