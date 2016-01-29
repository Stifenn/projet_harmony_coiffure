<?php $this->layout('layoutBack', ['title' => 'Gestion des commentaires']) ?>

<?php $this->start('main_content') ?>
<div class="row" >
  	<div class="col-md-6 col-md-offset-3">
		<?php foreach($Commentaires as $CurrentCommentaires) : ?>
			<article>
				<p>Pseudo : <?= $CurrentCommentaires['pseudo'] ?></p>
				<p>Email : <?= $CurrentCommentaires['email'] ?></p>
				<p>Message : <?= $CurrentCommentaires['commentaire'] ?></p>
			</article>
			<aside>
				<form action="<?= $this->url('modifier_commentaires',['id'=>$CurrentCommentaires['id']])?>" method="POST" accept-charset="utf-8">
					<input type="checkbox" name="statut" <?php if($CurrentCommentaires['moderation'] == 1){echo 'checked';} ?>>
					<input type="submit" name="modifier" class="btn btn-primary" value="Afficher">
					<input type="submit" name="supprimer" class="btn btn-danger" value="Supprimer">
				</form>
			</aside>
			<hr />
		<?php endforeach ?>	
	</div>
</div>

<?php $this->stop('main_content') ?>