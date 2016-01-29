<?php $this->layout('layoutFront', ['title' => 'Accueil !']) ?>

<?php $this->start('main_content') ?>

	<h2>Accueil Front</h2>

<?php	
	// Si il n'y a pas de session active j'affiche le lien de connexion
	if (!isset($_SESSION['user'])) : ?>
		<a href="<?= $this->url('login') ?>">Se connecter</a> | 
		<a href="<?= $this->url('create_user') ?>">Créer un compte</a>
<?php endif; ?>

<?php
	// si la session est active
	if(isset($_SESSION['user'])) :
		// on affiche le nom et l'email de l'utilisateur ?>
		<div id="user">
			<?= $_SESSION['user']['nom'] ?> (<em><?= $_SESSION['user']['email'] ?></em>)<br>
			<?php
				// si on est admin ou un employé, on affiche un lien vers la gestion
				if ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'staff') : ?>
					<a href="<?= $this->url('admin') ?>">Gestion</a> | 
				<?php endif;
				// si on est connecté on propose un lien son profil et de déconnexion ?>
			<a href="<?= $this->url('profil') ?>">Profil</a> | 
			<a href="<?= $this->url('logoff') ?>">Déconnexion</a>
		</div>
<?php endif; ?>


<?php $this->stop('main_content') ?>

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

<?php $this->start('produit') ?>
<?php foreach($produit as $CurrentProduit) :?>
	<li>
      <figure>
        <img class="portfolio-images" src="<?=$CurrentProduit['chemin']?>" alt="<?=$CurrentProduit['label']?>">
        <figcaption>
          <h3><?=$CurrentProduit['nom']?></h3>
          <span><?=$CurrentProduit['description']?></span>
          <a href="#">Take a look</a>
        </figcaption>
      </figure>
    </li>
<?php endforeach ?>
<?php $this->stop('produit') ?>


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

<?php $this->start('commentaire') ?>

<?php foreach($showCommentaire as $currentShowComment) :?>
	<blockquote class="blockquote-reverse">
  		<p><?=$currentShowComment['commentaire']?></p>
  		<footer><cite title="Source Title"><?=$currentShowComment['pseudo']?></cite></footer>
	</blockquote>
<?php endforeach ?>

<?php $this->stop('commentaire') ?>

<?php $this->start('google') ?>

<title>Travel modes in directions</title>

    <div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
    </select>
    </div>
    <div id="map" class="class="w-widget w-widget-map contac-map"" onload="initMap()"></div>
    
<?php $this->stop('google') ?>