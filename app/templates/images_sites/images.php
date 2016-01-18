<?php $this->layout('layoutBack', ['title' => 'Images du site']) ?>

<?php $this->start('main_content') ?>


<!-- formulaire pour l'image  -->
<div class="form_left">
	<form enctype="multipart/form-data" action="<?= $this->url('imagessubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="text" class="form-control" name="label" value="" placeholder="nom de l'image"><br>
		<input type="file" name="my-file" value="" placeholder="">
		<input type="submit" name="send" value="Ajouter">
	</form>
</div>
<div class="form_right">	
	<?php foreach ($images as $currentsimages) : ?> 
		<img src="<?= $this->assetUrl($currentsimages['chemin']) ?>" alt="<?= $currentsimages['label'] ?>" width="200px" height="auto" ><br>
		<form action="<?= $this->url('imagesdelete')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $currentsimages['id'] ?>">
			<input class="delete" type="submit" name="delete-file" value="x">
		</form>
	<?php endforeach ?>
</div>
	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>