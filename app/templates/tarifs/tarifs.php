<?php $this->layout('layoutBack', ['title' => 'Tarifs']) ?>

<?php $this->start('main_content') ?>
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
		<table class="table table-striped">
		  	<thead>
			    <tr>
			      <th>Prestation</th>
			      <th>Hommes</th>
			      <th>Femmes</th>
			    </tr>
			</thead>
				<tbody>
			      	<?php foreach($Tarifs as $CurrentTarifs) :?>
			      	<tr>
				      	<form action="<?= $this->url('modifier_tarifs',['id' => $CurrentTarifs['id']])?>" method="POST" accept-charset="utf-8">
					      	<td><input type="text" name="name" value="<?= $CurrentTarifs['name'] ?>"/></td>
					      	<td><input type="text" name="prix_femmes" value="<?= $CurrentTarifs['prix_femmes'] ?>"/></td>
					      	<td><input type="text" name="prix_hommes" value="<?= $CurrentTarifs['prix_hommes'] ?>"/></td>
					      	<td><input type="submit" name="modifier" class="btn btn-primary" value="Modifier" /></td>
					      	<td><input type="submit" name="supprimer" class="btn btn-danger" value="Supprimer" /></td>
				      	</form>
					</tr>
			     	<?php endforeach ?>
			    	<tr>
				     	<form action="<?= $this->url('ajouter_tarifs')?>" method="POST" accept-charset="utf-8">
					     	<td><input type="text" name="name" placeholder="Description" /></td>
						    <td><input type="text" name="prix_femmes" placeholder="prix pour les hommes" /></td>
					      	<td><input type="text" name="prix_hommes" placeholder="prix pour les femmes" /></td>
							<td><input type="submit" name="ajouter" class="btn btn-default" value="Ajouter" /></td>
						</form>
			    	</tr>
		  		</tbody>
		</table>
	</div>
</div>
	
<?php $this->stop('main_content') ?>