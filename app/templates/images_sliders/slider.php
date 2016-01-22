<?php $this->layout('layoutBack', ['title' => 'Image du Slider']) ?>

<?php $this->start('main_content') ?>
	
<div class="slider_back">	
	<div class="form_left">
		<form enctype="multipart/form-data" action="<?= $this->url('slidersubmit')?>" method="POST" accept-charset="utf-8">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
			<input type="file" name="my-file" value="" placeholder="">
			<input type="text" class="form-control"name="label" value="" placeholder="nom de l'image">
			<select name="select" class="btn btn-default">
					<option value="1" selected >image 1</option>
					<option value="2">image 2</option>
					<option value="3">image 3</option>
			</select><br>
			<input type="submit" class="btn btn-default" name="send" value="Modifier">
		</form>
	</div>

	<div class="form_right">	
		<?php foreach ($slider as $currentslider) : ?> 
			<div class="image_slider_back">
					<img src="<?= $this->assetUrl($currentslider['chemin']) ?>" class="img-thumbnail" alt="<?= $currentslider['label'] ?>" width="200px" height="auto" ><br>
					<input type="hidden" name="id" value="<?= $currentslider['id'] ?>">
			</div>	
		<?php endforeach ?>
	</div>
</div>




<?php $this->stop('main_content') ?>