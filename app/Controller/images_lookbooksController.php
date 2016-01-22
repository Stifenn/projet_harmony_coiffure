<?php

namespace Controller;

use \W\Controller\Controller;

class images_lookbooksController extends Controller
{
	public function home(){
		$this->show('default/home');
	}

	public function lookbook(){
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
		$images_lookbooksManager = new \Manager\images_lookbooksManager();
		$lookbook = $images_lookbooksManager->findAll('numero');
		$this->show('images_lookbooks/lookbook', ['lookbook'=>$lookbook]);
	}


	// function qui récupère les images pour le slider en DBB
	public function insert_image_lookbook(){
	$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */		
		// J'ai recu des données de formulaire
		if ( isset($_POST['send'])) {

			// je teste si le label n'est pas vide
			if (!empty($_POST['label'])) {

				// Vérifier si le téléchargement du fichier n'a pas été interrompu
				if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
					echo 'Erreur lors du téléchargement.';
				} else {
					// Objet FileInfo
					$finfo = new \finfo(FILEINFO_MIME_TYPE);

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
					    $path = 'assets/img/lookbook/' . $chemin;
					    $pathbd = 'img/lookbook/' . $chemin;
					    $label = $_POST['label'];
						$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
						if(!$moved) {
							echo 'Erreur lors de l\'enregistrement';
						}
					}
				}
			} else {
			echo 'Veuillez renseigner le nom de l\'image !';
			}
		}
			$images_lookbooksManager = New \Manager\images_lookbooksManager();

			$lookbook = $images_lookbooksManager->update_image_lookbook($pathbd ,$_REQUEST['label'], $_REQUEST['numero']);

/*			$this->show('images_lookbooks/lookbook', ['lookbook'=>$lookbook]);*/
			$this->redirectToRoute('lookbook');
	}
}