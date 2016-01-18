<?php $this->layout('layoutBack', ['title' => 'Produits']) ?>

<?php $this->start('main_content') ?>


<!-- formulaire pour l'image  -->
<div class="form_left">
	<form enctype="multipart/form-data" action="<?= $this->url('produitssubmit')?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
		<input type="text" class="form-control"name="nom" value="" placeholder="Nom de la marque">
		<input type="text" class="form-control"name="description" value="" placeholder="description">
		<input type="text" class="form-control"name="label_image" value="" placeholder="nom de l'image"><br>
		<input type="file" name="my-file" value="" placeholder="">
		<input type="submit" name="send" value="Ajouter">
	</form>
</div>
<div class="form_right">	
	<?php foreach ($produits as $currentsproduits) : ?> 
		<img src="<?= $this->assetUrl($currentsproduits['chemin_image']) ?>" alt="<?= $currentsproduits['label_image'] ?>" width="250" height="auto" ><br>
		<form action="<?= $this->url('produitsdelete')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $currentsproduits['id'] ?>">
			<input type="submit" name="delete-file" value="Supprimer">
		</form>
		<p>nom: <?= $currentsproduits['nom'] ?></p>
		<p>description: <?= $currentsproduits['description'] ?></p>
	<?php endforeach ?>
</div>
	<a href="<?= $this->url('home') ?>">Accueil</a>

<?php $this->stop('main_content') ?>