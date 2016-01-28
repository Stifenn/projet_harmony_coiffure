<?php $this->layout('layoutBack', ['title' => 'Produits']) ?>

<?php $this->start('main_content') ?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<?php foreach ($produits as $currentsproduits) : ?> 
			<div id="image_produit" class="<?= $currentsimages['numero'] ?>">
				<img src="<?= $this->assetUrl($currentsproduits['chemin']) ?>" class="img-thumbnail" alt="<?= $currentsproduits['label'] ?>" width="300" height="auto" ><br>
				<input type="hidden" name="id" value="<?= $currentsproduits['id'] ?>">
			</div>
			<div class="image_produit_description">
				<p>nom: <?= $currentsproduits['nom'] ?></p>
				<p>description: <?= $currentsproduits['description'] ?></p>
				<div class="clearfix"></div>
			</div>
	<?php endforeach ?>

	<div class="row">
		<?php if(isset($errorFile) && $errorFile === true) echo '<p>Erreur : pas de fichier!</p>' ?>
		<?php if(isset($error) && $error === true) echo '<p>Veuillez remplir tous les champs!</p>' ?>
	</div>
<!-- 	</div>
</div>

<div class="row">
	<div class="col-md-5 col-md-offset-3"> -->
<!-- formulaire pour l'image  -->
		<form enctype="multipart/form-data" action="<?= $this->url('produitssubmit')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<input type="text" class="form-control"name="nom" value="" placeholder="Nom de la marque">
			<input type="text" class="form-control"name="description" value="" placeholder="description">
			<input type="text" class="form-control"name="label" value="" placeholder="nom de l'image"><br>
			<input type="file" name="my-file" value="" placeholder="">
			<select name="select" class="btn btn-default">
				<option value="1" selected >Produit 1</option>
				<option value="2">Produit 2</option>
				<option value="3">Produit 3</option>
			</select><br>
			<input type="submit" class="btn btn-default" name="send" value="Modifier">
		</form>
	</div>
</div>

<?php $this->stop('main_content') ?>