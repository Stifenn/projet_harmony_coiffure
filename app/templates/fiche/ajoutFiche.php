<?php $this->layout('layoutBack', ['title' => 'ajout d\'une prestation']) ?>

<?php $this->start('main_content') ?>

	<form action="" method="post" accept-charset="utf-8">
		<input type="text" name="nom" placeholder="Nom">
		<input type="hidden" name="id" value="">
		<textarea name="description" placeholder="Description"></textarea>
		<input type="submit" name="submit" value="Envoyer">
	</form>

<?php $this->stop('main_content') ?>