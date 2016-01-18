<?php $this->layout('layoutBack', ['title' => 'Images du Lookbook']) ?>

<?php $this->start('main_content') ?>
	
	
<div class="form_left">
	<form enctype="multipart/form-data" action="<?= $this->url('lookbooksubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="text" class="form-control" name="label" value="" placeholder="nom de l'image"><br>
		<input type="file" name="my-file" value="" placeholder="">
		<input type="submit" name="send" value="Ajouter">
	</form>
</div>

<div class="form_right">	
		<?php foreach ($lookbook as $currentLookbook) : ?> 
			<img src="<?= $this->assetUrl($currentLookbook['chemin']) ?>" alt="<?= $currentLookbook['label'] ?>" width="200px" height="auto" ><br>
			<form action="<?= $this->url('lookbookdelete')?>" method="POST" accept-charset="utf-8">
				<input type="hidden" name="id" value="<?= $currentLookbook['id'] ?>">
				<input class="delete" type="submit" name="delete-file" value="x">
			</form>
		<?php endforeach ?>
</div>	

	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>