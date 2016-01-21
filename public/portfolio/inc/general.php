<?php 

	if (isset($_POST['send']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		updateLastname($pdo, $lastname);
		updateFirstname($pdo, $firstname);

	}
 		$oldLastname = recupLastname($pdo);
 		$oldFirstname = recupFirstname($pdo);


?>
 <form  action="#" method="post" accept-charset="utf-8">
	<label for="firstname">Votre Prénom: </label>
	 <input type="text" name="firstname" value="<?php echo $oldFirstname['value'] ?>" placeholder="Prénom"><br>

	<label for="lastname">Votre Nom: </label>
	 <input type="text" name="lastname" value="<?php echo $oldLastname['value'] ?>" placeholder="Nom"><br>

	 <input type="submit" name="send" value="Envoyer">
</form>
<?php
	// J'ai recu des données de formulaire
	if(isset($_POST['send-file'])) {

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
			    $path = '../../img/avatar' . '.' . $extFoundInArray;
				$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
				updateAvatar($pdo,$path);
				if(!$moved) {
					echo 'Erreur lors de l\'enregistrement';
				}
			}
		}
	}
	$avatar = getAvatar($pdo); 

?>

	<!-- CECI EST UN FORMULAIRE POUR UPLOAD DES AVATARS MAIS LA TAILLE SERA MODIFIER EN CSS -->
<form class="form_image"enctype="multipart/form-data" action="#" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	<input name="my-file" type="file" /><br>
	<input type="submit" name="send-file" value="Envoyer le fichier" /><br>
</form>

<img id="avatar" src="<?php echo $avatar['value'];?>" alt=\"avatar\" />
