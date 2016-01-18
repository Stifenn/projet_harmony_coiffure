<?php $this->layout('layoutBack', ['title' => 'Images du site']) ?>

<?php $this->start('main_content') ?>


<!-- formulaire pour l'image  -->

	<form enctype="multipart/form-data" action="<?= $this->url('imagessubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="file" name="my-file" value="" placeholder="">
		<input type="text" name="label" value="" placeholder="nom de l'image"><br>
		<input type="submit" name="send" value="Ajouter">
	</form>

	
	<?php foreach ($images as $currentsimages) : ?> 
		<img src="<?= $this->assetUrl($currentsimages['chemin']) ?>" alt="<?= $currentsimages['label'] ?>" width="250" height="auto" ><br>
		<form action="<?= $this->url('imagesdelete')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $currentsimages['id'] ?>">
			<input type="submit" name="delete-file" value="Supprimer">
		</form>
	<?php endforeach ?>

	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>