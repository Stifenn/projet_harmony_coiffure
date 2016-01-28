<?php

namespace Controller;

use \W\Controller\Controller;

class images_sitesController extends Controller
{
	public function home(){
		$this->show('default/home');
	}

	public function images(){
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
		$images_sitesManager = new \Manager\images_sitesManager();
		$images = $images_sitesManager->findAll("id") ;
		$this->show('images_sites/images', ['images'=>$images]);
	}


	// function qui récupère les images pour le slider en DBB
	public function insert_images_sites	(){
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
		$errorFile = $errorLabel = false;
		// J'ai recu des données de formulaire
		if ( isset($_POST['send'])) {

			if (isset($_POST['label']))	{
				// je teste si le label n'est pas vide
				if (($_POST['label'] !=='') && !empty($_FILES['my-file'])) {

					// Vérifier si le téléchargement du fichier n'a pas été interrompu
					if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
						$errorFile = true;
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
						    $path = 'assets/img/images_sites/' . $chemin;
						    $pathbd = 'img/images_sites/' . $chemin;
						    $label = $_POST['label'];
							$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
							if(!$moved) {
								echo 'Erreur lors de l\'enregistrement';
							}
						}
					}
				} else { 
					$errorLabel = true;
				}
			}
		}
		if($errorFile || $errorLabel) {
			$images_sitesManager = new \Manager\images_sitesManager();
			$images = $images_sitesManager->findAll("id") ;
			$this->show('images_sites/images', ['images'=>$images, 'errorFile' => $errorFile, 'errorLabel' => $errorLabel]);
		}else{
			$images_sitesManager = New \Manager\images_sitesManager();
			$images = $images_sitesManager->update_image_site( $pathbd, $_REQUEST['label'], $_REQUEST['select'] );
	/*		$this->show('images_sites/images', ['images'=>$images]);*/
			$this->redirectToRoute('images');
		}
	}
}

