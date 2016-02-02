<?php $this->layout('layoutBack', ['title' => 'Images de présentation du salon']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php foreach ($images as $currentsimages) : ?> 
			<div class="<?= $currentsimages['position'] ?>">	
				<img src="<?= $this->assetUrl($currentsimages['chemin']) ?>" class="img-thumbnail" alt="<?= $currentsimages['label'] ?>">
				<input type="hidden" name="id" value="<?= $currentsimages['id'] ?>"><br>
			</div>	
		<?php endforeach ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php if(isset($errorFile) && $errorFile === true) echo '<h2>Erreur : pas de fichier</h2>' ?>
		<?php if(isset($errorLabel) && $errorLabel === true) echo '<h2>Veuillez remplir le nom!</h2>' ?>
	</div>
</div>


<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<div class="images_back">
			<form enctype="multipart/form-data" id="form" action="<?= $this->url('imagessubmit')?>" method="POST" accept-charset="utf-8">
				
				<input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
				<label for="label">Nom de l'image :</label>
				<input type="text" class="form-control" id="label" name="label" placeholder="nom de l'image"><br>
				<input type="file" name="my-file" placeholder="">
				<select name="select" class="btn btn-default">
					<option value="top" selected >devanture</option>
					<option value="left">image de gauche</option>
					<option value="middle">image centrale</option>
					<option value="right">image de droite</option>
				</select><br>
				<input type="submit" id="send" class="btn btn-default dropdown-toggle" name="send" value="Modifier">
			</form>	
		</div>
	</div>
</div>
<?php $this->stop('main_content') ?>
