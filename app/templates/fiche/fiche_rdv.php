<?php $this->layout('layoutBack', ['title' => 'Fiche utilisateur']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($fiche) && !empty($fiche)) : ?>
	
	<table>
		<caption><?= $fiche[0]['nom']?> <?=$fiche[0]['prenom']?></caption>
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
	      		<td><?=$currentFiche['description']?></td>	
			</tr>
	      <?php endforeach ?>
	  </tbody>
	</table>
	<?php else : ?> 
 		<p>cette utilisateur n'a pas de fiche client</p>
	<?php endif ?>
	<form action="<?=$this->url('ajout_fiche')?>" method="post" accept-charset="utf-8">
		<input type="text" name="date" placeholder="aaaa-mm-jj">
		<input type="hidden" name="id" value="<?= $fiche[0]['id']?>">
		<input type="submit" name="soumettre" value="Soumettre">
	</form>

<?php $this->stop('main_content') ?>