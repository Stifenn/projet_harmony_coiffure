<?php

namespace Controller;

use \W\Controller\Controller;

class images_lookbooksController extends Controller
{
	public function home(){
		$this->show('default/home');
	}

	public function lookbook(){
		$images_lookbooksManager = new \Manager\images_lookbooksManager();
		$lookbook = $images_lookbooksManager->findAll("chemin");
		$this->show('images_lookbooks/lookbook', ['lookbook'=>$lookbook]);
	}


	// function qui récupère les images pour le slider en DBB
	public function insert_image_lookbook(){
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
				    $path = 'img/' . $chemin;
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
		$lookbook = $images_lookbooksManager->insert(['chemin'=>$path , 'label'=>$_REQUEST['label']]);
		/*$this->show('images_sliders/lookbook', ['lookbook'=>$lookbook]);*/
		$this->redirectToRoute('lookbook');
	}

	public function delete_image_lookbook(){
		$images_lookbooksManager = New \Manager\images_lookbooksManager();
		$id = $_REQUEST['id'];
		$lookbook = $images_lookbooksManager->delete($id);
		/*$this->show('images_sliders/lookbook', ['lookbook'=>$lookbook]);*/
		$this->redirectToRoute('lookbook');
	}
}