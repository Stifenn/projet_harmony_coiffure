<?php $this->layout('layoutBack', ['title' => 'Images du Lookbook']) ?>

<?php $this->start('main_content') ?>
	
	

<div class="row">
	<div class="col-md-7 col-md-offset-2">
		<div id="lookbook">	
			<?php foreach ($lookbook as $currentLookbook) : ?> 
				<div class="image_lookbook">
					<a class="fancybox" data-title-id="title-<?= $currentLookbook['numero'] ?>"  href="<?= $this->assetUrl($currentLookbook['chemin']) ?>">
						<img src="<?= $this->assetUrl($currentLookbook['chemin']) ?>" class="img-thumbnail" alt="<?= $currentLookbook['label'] ?>" value="<?= $currentLookbook['numero'] ?>">
					</a>
					<div id="title-<?= $currentLookbook['numero'] ?>" class="hidden">
						<form enctype="multipart/form-data" action="<?= $this->url('lookbooksubmit')?>" method="POST" accept-charset="utf-8">
							<input type="hidden" name="numero" value="<?= $currentLookbook['numero'] ?>">
							<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
							<input type="text" class="form-control" name="label" value="" placeholder="nom de l'image"><br>
							<input type="file" name="my-file" value="" placeholder="">
							<input type="submit" class="btn btn-default" name="send" value="Modifier">
						</form>
					</div>
				</div>
			<?php endforeach ?>
		</div>	
	</div>
</div>



<?php $this->stop('main_content') ?>

