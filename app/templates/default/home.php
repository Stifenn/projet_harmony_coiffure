<?php $this->layout('layoutFront', ['title' => 'Accueil !']) ?>

<?php $this->start('div_fixe') ?>
	<div id="user">
	<?php
		// Si il n'y a pas de session active j'affiche les lien de connexion et de création de compte
		if (!isset($_SESSION['user'])) : ?>
			<a href="<?= $this->url('login') ?>">Se connecter</a> | 
			<a href="<?= $this->url('create_user') ?>">Créer un compte</a>
	<?php endif; ?>

	<?php
		// si la session est active
		if(isset($_SESSION['user'])) :
			// on affiche le prenom et l'email de l'utilisateur ?>
				<strong><?= $_SESSION['user']['prenom'] ?></strong>
				<br>
				(<em><?= $_SESSION['user']['email'] ?></em>)<br>
				<?php
					// si on est admin ou un employé, on affiche un lien vers la gestion
					if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'staff') : ?>
						<a href="<?= $this->url('admin') ?>">Gestion</a> | 
					<?php else : ?>
				<!-- si on est connecté on propose un lien profil pour les clients et déconnexion pour tous -->
						<a href="<?= $this->url('profil') ?>">Profil</a> |
					<?php endif ?> 
				<a href="<?= $this->url('logoff') ?>">Déconnexion</a>
	<?php endif; ?>
	</div>


<?php $this->stop('div_fixe') ?>

	<!--

	SLIDER

	-->

<?php $this->start('slider')?>

<?php foreach($slider as $currentSlider) : ?>
	<li><img src="<?=$this->assetUrl($currentSlider['chemin'])?>" alt="<?=$currentSlider['label']?>" /></li>
<?php endforeach ?>

<?php $this->stop('slider')?>

<!--

	LE SALON

	-->

<?php $this->start('about')?>

<?php foreach($imageSite as $currentImageSite) : ?>
	<?php if($currentImageSite['position'] == 'top') : ?>
			<img class="about-img" src="<?=$this->assetUrl($currentImageSite['chemin'])?>" alt="<?=$currentImageSite['label']?>" />
		<?php endif ?>
	<?php if($currentImageSite['position'] == 'left' || $currentImageSite['position'] == 'middle' || $currentImageSite['position'] == 'right') :?>	
      	<div class=" w-col w-col-4">
			<img class="about-img" src="<?=$this->assetUrl($currentImageSite['chemin'])?>" alt="<?=$currentImageSite['label']?>" />
        </div>
    <?php endif ?>    	
<?php endforeach ?>

<?php $this->stop('about')?>

<!--

	TARIF

	-->

<?php $this->start('tarif') ?>
	<table>
	  <thead>
	    <tr>
	      <th>Prestation</th>
	      <th>Hommes</th>
	      <th>Femmes</th>
	    </tr>
	  </thead>
	  <tbody>
	      <?php foreach($tarif as $CurrentTarifs) :?>
	      	<tr> 	
			    <td><?= $CurrentTarifs['name'] ?></td>
			    <td><?= $CurrentTarifs['prix_hommes'] ?></td>
			    <td><?= $CurrentTarifs['prix_femmes'] ?></td>
			</tr>
	      <?php endforeach ?>
	  </tbody>
	</table>
<?php $this->stop('tarif') ?>

<!--

	PRODUIT

	-->

<?php $this->start('produit') ?>
<?php foreach($produit as $CurrentProduit) :?>
	<li>
      <figure>
        <img class="portfolio-images" src="<?=$this->assetUrl($CurrentProduit['chemin'])?>" alt="<?=$CurrentProduit['label']?>">
        <figcaption>
          <h3><?=$CurrentProduit['nom']?></h3>
          <span><?=$CurrentProduit['description']?></span>
          <!--<a href="#">Take a look</a>-->
        </figcaption>
      </figure>
    </li>
<?php endforeach ?>
<?php $this->stop('produit') ?>

<!--

	AJOUT COMMENTAIRE

	-->


<?php $this->start('Ajout_Commentaire') ?>

<form action="#" method="post">
    <label for="name">Nom:</label>
     <input class="w-input" type="text" placeholder="Entrer votre Nom" name="name">
   <label for="email">Email:</label>
     <input class="w-input" placeholder="Entrer votre Email" type="text" name="email" required="required">
   <label for="email">Votre Message:</label>
     <textarea class="w-input message" placeholder="Entrer votre Message" name="message"></textarea><br>
   <input class="w-button" type="submit" value="Send">
</form>  

<?php $this->stop('Ajout_Commentaire') ?>

<!--

	COMMENTAIRE

	-->

<?php $this->start('commentaire') ?>

<?php foreach($showCommentaire as $currentShowComment) :?>
	<blockquote class="blockquote-reverse">
  		<p><?=$currentShowComment['commentaire']?></p>
  		<footer><cite title="Source Title"><?=$currentShowComment['pseudo']?></cite></footer>
	</blockquote>
<?php endforeach ?>

<?php $this->stop('commentaire') ?>

<!--

	GOOGLE

	-->

<?php $this->start('google') ?>
<div id="floating-panel">
	<b>Mode of Travel: </b>
	<select id="mode">
	  <option value="DRIVING">Driving</option>
	  <option value="WALKING">Walking</option>
	  <option value="BICYCLING">Bicycling</option>
	</select>
</div>
<div id="map" onload="initMap()"></div>
    
<?php $this->stop('google') ?>


<?php $this->start('show_image_lookbook') ?>

	<?php foreach ($show_lookbook as $currentLookbook) : ?>
					<div class="image_lookbook">
						<a class="fancybox" rel="gallery" data-title-id="title-<?= $currentLookbook['numero'] ?>"  href="<?= $this->assetUrl($currentLookbook['chemin']) ?>">
							<img src="<?= $this->assetUrl($currentLookbook['chemin']) ?>"  alt="<?= $currentLookbook['label'] ?>" value="<?= $currentLookbook['numero'] ?>">
						</a>
					</div>
	<?php endforeach ?>

<?php $this->stop('show_image_lookbook') ?>
