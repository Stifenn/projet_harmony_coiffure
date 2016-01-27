<?php $this->layout('layoutBack', ['title' => 'modification d\'une fiche']) ?>

<?php $this->start('main_content') ?>
	 
	<table>
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

	<form  id="formRecherche" action="<?=$this->url('prestation')?>" method="post" accept-charset="utf-8">
		<input type="text" name="nom" placeholder="Nom">
		<input type="hidden" name="idFiche" value="<?= $_POST['fiche-id']?>">
		<textarea name="description" placeholder="Description"></textarea>
		<input type="submit" name="submit" value="Envoyer">
	</form>

<?php $this->stop('main_content') ?>