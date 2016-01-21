<?php

$avatar = getAvatar($pdo);
$oldLastname = recupLastname($pdo);
$oldFirstname = recupFirstname($pdo);
$getcont = getContent($pdo);


?>
<!-- 
	<div>
	<img src="<?php echo $avatar['value']; ?>" alt="avatar"  width="100px" height="100px" />
	<p><?php echo $oldLastname['value']." ".$oldFirstname['value'];?></p>
</div> -->
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
   

  <?php

   $id_user = 1;
  // on récupère les images du slide d'après l'id_user
  $tab_image = get_image_slider($pdo, $id_user);

  // Afficher des images enregistrées en DB avec un button de suppression
  foreach ($tab_image as $currentImage) : ?>
      <li><img src="<?php echo "../../img/".$currentImage['chemin'];?>" alt="<?php echo $currentImage['label'];?>"/></li> 
  <?php endforeach; ?>
  </ul>
</div>
<div>
	<p><?php echo $getcont['value'] ?></p>
</div>
<div id="map">
  </div>
</body>
</html>


	