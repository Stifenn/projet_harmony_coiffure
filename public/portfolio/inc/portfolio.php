<?php 

	$id_user = 1;
	// on récupère les images du slide d'après l'id_user
	$tab_image =getImage_portfolio($pdo, $id_user);

	// Afficher des images enregistrées en DB avec un button de suppression
	foreach ($tab_image as $currentImage) {
			echo ' <figure><figcaption>'.$currentImage['label'].'</figcaption>';
			echo '<img src="../../img/'.$currentImage['chemin'].'" alt="'.$currentImage['label'].'" /></figure>';
	}	

	//BOUTON DELETE A REMETTRE DANS LE FOREACH
 //<button class="delete" 
				//type="submit" name="delete" value="'.$currentImage['label'].'">Supprimer</button>


	// J'ai recu des données de formulaire
	if(isset($_POST['ajout_image'])) {

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
			    $chemin = trim($_POST['titre']) . '.' . $extFoundInArray;
			    $path = '../../img/' . $chemin;
			    $label = $_POST['legend'];
			    $title= $_POST['titre'];
				$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
				insertImage_portfolio($pdo, $label, $chemin, $id_user);
;
				if(!$moved) {
					echo 'Erreur lors de l\'enregistrement';
				}
			}
		}
	}
?>

<!-- <h2>Portfolio</h2>
<form enctype="multipart/form-data" action="#" method="post" accept-charset="utf-8">
	<input type="text" name="titre" value="" placeholder="Titre"><br>
	<input type="text" name="legend" value="" placeholder="Légende"><br>
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input name="my-file" type="file" /><br>
	<input type="Submit" name="ajout_image" value="Ajouter une image">
</form>  -->