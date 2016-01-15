<?php

namespace Controller;

use \W\Controller\Controller;

class produitsController extends Controller
{
	public function home(){
		$this->show('default/home');
	}

	public function produits(){

		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
		$produitsManager = new \Manager\produitsManager();
		$produits = $produitsManager->findAll("chemin_image");
		$this->show('produits/produits', ['produits'=>$produits]);
	}


	// function qui récupère les images pour le slider en DBB
	public function insert_produits(){
	$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
	// J'ai recu des données de formulaire
	if ( isset($_POST['send'])) {

		// je teste si le label n'est pas vide
		if (!empty($_POST['label_image']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_FILES['my-file'])) {

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
				    $path = 'assets/img/image_produits/' . $chemin;
				    $pathbd = 'img/image_produits/' . $chemin;
				    $label = $_POST['label_image'];
					$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
					if(!$moved) {
						echo 'Erreur lors de l\'enregistrement';
					}
				}
			}
		} else { 
			 
		echo 'Veuillez renseigner tous les champs !';

		}
	}
		$produitsManager = New \Manager\produitsManager();
		$produits = $produitsManager->insert(['chemin_image'=>$pathbd, 'label_image'=>$_REQUEST['label_image'], 'nom'=>$_REQUEST['nom'], 'description'=>$_REQUEST['description']]);
/*		$this->show('produits/image_produits', ['image_produits'=>$image_produits]);*/
		$this->redirectToRoute('produits');
	}

	public function delete_produits(){
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
		$produitsManager = New \Manager\produitsManager();
		$id = $_REQUEST['id'];
		$produits = $produitsManager->delete($id);
/*		$this->show('produits/image_produits', ['image_produits'=>$image_produits]);*/
		$this->redirectToRoute('produits');
	}
}