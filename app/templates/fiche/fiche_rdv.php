<?php $this->layout('layoutBack', ['title' => 'Fiche utilisateur']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($fiche) && !empty($fiche) && !empty($fiche[0]['id'])) : ?>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<table class="table table-striped">
			<caption><?= $fiche[0]['nom']?> <?= $fiche[0]['prenom']?></caption>
		  <thead>
		    <tr>
		      <th>Date</th>
		      <th>Description</th>
		    </tr>
		  </thead>
		  <tbody>
		      <?php foreach($fiche as $currentFiche) : ?>
		      	<tr>
		      		<td><?=$currentFiche['date']?></td>
		      		<td>
						<form class="form-horizontal" action="<?=$this->url('modif_fiche',['id'=>$currentFiche['id']])?>" method="post" accept-charset="utf-8">
							<input type="hidden" name="fiche-id" value="<?=$currentFiche['id']?>">
							<input type="hidden" name="user-id" value="<?=$currentFiche['id_users']?>">
							<div class="col-sm-10 col-sm-offset-2">
								<input class="btn btn-default" type="submit" name="modifier" value="Modifier">
							</div>
						</form>
					</td>
				</tr>
		      <?php endforeach ?>
		  </tbody>
		</table>
	</div>
</div>
	<?php else : ?>
		<div class="col-sm-10 col-sm-offset-2">
 			<p>Cette utilisateur n'a pas encore de fiche client !</p>
 		</div>
	<?php endif ?>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" id="formDate" action="<?=$this->url('ajout_fiche')?>" method="post" accept-charset="utf-8">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="date">Date</label>
				<div class="col-sm-10">
					<input class="form-control" id="date" type="date" name="date" placeholder="aaaa-mm-jj">
				</div>
			</div>
			<input type="hidden" name="id" value="<?= $clientId;?>">
			<div class="col-sm-offset-2 col-sm-10">
				<input class="btn btn-primary" type="submit" name="soumettre" value="Soumettre">
			</div>
		</form>

<?php $this->stop('main_content') ?>