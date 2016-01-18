<?php $this->layout('layoutBack', ['title' => 'Image du Slider']) ?>

<?php $this->start('main_content') ?>
	
	
<div class="form_left">
	<form enctype="multipart/form-data" action="<?= $this->url('slidersubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="file" name="my-file" value="" placeholder="">
		<input type="text" class="form-control"name="label" value="" placeholder="nom de l'image"><br>
		<input type="submit" name="send" value="Ajouter">
	</form>
</div>

<div class="form_right">	
	<?php foreach ($slider as $currentslider) : ?> 
		<img src="<?= $this->assetUrl($currentslider['chemin']) ?>" alt="<?= $currentslider['label'] ?>" width="200px" height="auto" ><br>
		<form action="<?= $this->url('sliderdelete')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $currentslider['id'] ?>">
			<input class="delete" type="submit" name="delete-file" value="X">
		</form>
	<?php endforeach ?>
</div>

	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>