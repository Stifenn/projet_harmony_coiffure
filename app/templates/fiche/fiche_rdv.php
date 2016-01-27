<?php $this->layout('layoutBack', ['title' => 'Fiche utilisateur']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($fiche) && !empty($fiche) && !empty($fiche[0]['id'])) : ?>

	<table>
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
				<form action="<?=$this->url('modif_fiche',['id'=>$currentFiche['id']])?>" method="post" accept-charset="utf-8">
					<input type="hidden" name="fiche-id" value="<?=$currentFiche['id']?>">
					<input type="hidden" name="user-id" value="<?=$currentFiche['id_users']?>">
					<input type="submit" name="modifier" value="Modifier">
				</form>
				</td>
			</tr>
	      <?php endforeach ?>
	  </tbody>
	</table>
	<?php else : ?> 
 		<p>cette utilisateur n'a pas de fiche client</p>
	<?php endif ?>
	
	<form id="formDate" action="<?=$this->url('ajout_fiche')?>" method="post" accept-charset="utf-8">
		<input type="date" name="date" placeholder="aaaa-mm-jj">
		<input type="hidden" name="id" value="<?= $clientId;?>">
		<input type="submit" name="soumettre" value="Soumettre">
	</form>

<?php $this->stop('main_content') ?>