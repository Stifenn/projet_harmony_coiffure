<?php $this->layout('layoutBack', ['title' => 'Image du Slider']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="col-md-3"></div>
	<div class="slider_back">	
			<?php foreach ($slider as $currentslider) : ?> 
				<div class="image_slider_back">
						<img src="<?= $this->assetUrl($currentslider['chemin']) ?>" class="img-thumbnail" alt="<?= $currentslider['label'] ?>" width="300px" height="auto" ><br>
						<input type="hidden" name="id" value="<?= $currentslider['id'] ?>">
				</div>	
			<?php endforeach ?>
	</div>
</div>
		<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">	
			<form class="form_slider"enctype="multipart/form-data" action="<?= $this->url('slidersubmit')?>" method="POST" accept-charset="utf-8">
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
				<div class="row">
					<div class="col-md-4 col-md-offset-0">	
						<?php if(isset($errorFile) && $errorFile === true) echo '<h2>Erreur : pas de fichier</h2>' ?>
						<?php if(isset($errorLabel) && $errorLabel === true) echo '<h2>Erreur : pas de nom</h2>' ?>
					</div>
				</div>		
				<input type="text" class="form-control"name="label" value="" placeholder="nom de l'image">
				<input type="file" name="my-file" value="" placeholder=""><br>
				<select name="select" class="btn btn-default">
						<option value="1" selected >image 1</option>
						<option value="2">image 2</option>
						<option value="3">image 3</option>
				</select><br>
				<input type="submit" class="btn btn-default" name="send" value="Modifier">
			</form>
				
			
	
		</div>	
	</div>



<?php $this->stop('main_content') ?>