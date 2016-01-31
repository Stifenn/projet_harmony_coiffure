<?php $this->layout('layoutBack', ['title' => 'Modification d\'une fiche']) ?>

<?php $this->start('main_content') ?>

<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<table class="table table-striped">
			<thead>
		    	<tr>
			      <th>Nom</th>
			      <th>Description</th>
			    </tr>
		    </thead>
		  	<tbody>
			<?php foreach($prestation as $currentPrestation) : ?>
		      	<tr>
			      	<td><?= $currentPrestation['name']?></td>
			      	<td><?= $currentPrestation['description']?></td>
				</tr>
		   	<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" id="formRecherche" action="<?=$this->url('prestation')?>" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="nom">Nom</label>
				<div class="col-sm-10">
					<input class="form-control" id="nom" type="text" name="nom" placeholder="Nom">
				</div>
			</div>
			<input type="hidden" name="idFiche" value="<?= $_POST['fiche-id']?>">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="description">Description</label>
				<div class="col-sm-10">
					<textarea id="description" class="form-control" rows="3" name="description" placeholder="Description"></textarea>
				</div>
			</div>
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-primary" type="submit" name="submit" value="Envoyer">
			</div>
		</form>

<?php $this->stop('main_content') ?>