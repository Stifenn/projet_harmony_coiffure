<?php 

	$id_user = 1;
	// on récupère les images du slide d'après l'id_user
	$tab_image = get_image_slider($pdo, $id_user);

	// Afficher des images enregistrées en DB avec un button de suppression
	foreach ($tab_image as $currentImage) :
			echo '<img src="../../img/'.$currentImage['chemin'].'" alt="'.$currentImage['label'].'" width="250px" height="250px" />'; ?>
			<form action="#" method="POST" accept-charset="utf-8">
				<input type="hidden" name="delete" value="<?php echo $currentImage['label'] ?>">
				<input type="submit" name="delete-file" value="Supprimer">
			</form>
	<?php endforeach ?>

<?php

	// Action sur le boutton supprimer
	if (isset($_POST['delete-file'])) {
		$label = $_POST['delete'];
		delete_image_slider($pdo, $label);
	}


?>

<form class="form_image" enctype="multipart/form-data" action="#" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input name="my-file" type="file" /><br>
	<input type="text" name="label" placeholder="nom de l'image">
	<input type="submit" name="send-file" value="Ajouter" /><br>
</form>

<?php 
	// J'ai recu des données de formulaire
	if ( isset($_POST['send-file'])) {

		// je teste si le label n'est pas vide
		if (!empty($_POST['label'])) {

			// Vérifier si le téléchargement du fichier n'a pas été interrompu
			if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
				echo 'Erreur lors du téléchargement.';
			} else {
				// Objet FileInfo
				$finfo = new finfo(FILEINFO_MIME_TYPE);

				// Récupération du Mime
				$mimeType = $finfo->file($_FILES['my-file']['tmp_name']);

				$extFoundInArray = array_search(
			        $mimeType,
			        array(
			            'jpg' => 'image/jpeg',
			            'png' => 'image/png',
			            'gif' => 'image/gif',
			        )
			    );
			    if ($extFoundInArray === false) {
			    	echo 'Le fichier n\'est pas une image';
			    } else {
				    // Renommer nom du fichier
				    $chemin = sha1_file($_FILES['my-file']['tmp_name']) . '.' . $extFoundInArray;
				    $path = '../../img/' . $chemin;
				    $label = $_POST['label'];
					$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
					insert_image_slider($pdo, $label, $chemin, $id_user);
					if(!$moved) {
						echo 'Erreur lors de l\'enregistrement';
					}
				}
			}
		} else {
		echo 'Veuillez renseigner le nom de l\'image !';
		}
	}
?>