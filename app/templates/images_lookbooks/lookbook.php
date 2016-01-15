<?php $this->layout('layoutBack', ['title' => 'Image du Lookbook']) ?>

<?php $this->start('main_content') ?>
	
	

	<form enctype="multipart/form-data" action="<?= $this->url('lookbooksubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="file" name="my-file" value="" placeholder="">
		<input type="text" name="label" value="" placeholder="nom de l'image"><br>
		<input type="submit" name="send" value="Ajouter">
	</form>


	
		<?php foreach ($lookbook as $currentLookbook) : ?> 
			<img src="<?= $this->assetUrl($currentLookbook['chemin']) ?>" alt="<?= $currentLookbook['label'] ?>" width="50%" height="50%" ><br>
			<form action="<?= $this->url('lookbookdelete')?>" method="POST" accept-charset="utf-8">
				<input type="hidden" name="id" value="<?= $currentLookbook['id'] ?>">
				<input type="submit" name="delete-file" value="Supprimer">
			</form>
		<?php endforeach ?>
	

	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>