<?php $this->layout('layoutBack', ['title' => 'Admin']) ?>

<?php $this->start('main_content') ?>
	<h2>Administration</h2>
	<a href="<?= $this->url('manage') ?>">Gestion des comptes utilisateurs</a> | 
	<a href="<?= $this->url('slider') ?>">Slider</a> | 
	<a href="<?= $this->url('lookbook') ?>">Lookbook</a> | 
	<a href="<?= $this->url('produits') ?>">Produits</a> | 
	<a href="<?= $this->url('administration_tarifs') ?>">Tarifs</a> |
	<a href="<?= $this->url('administration_commentaires') ?>">Commentaires</a>

<?php $this->stop('main_content') ?>