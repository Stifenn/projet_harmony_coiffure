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
		$produits = $produitsManager->findAll("id");
		$this->show('produits/produits', ['produits'=>$produits]);
	}


	// function qui récupère les images pour le slider en DBB
	public function insert_produits(){
		$this->allowTo(['admin', 'staff']); /*-> limite l'accès à l'admin ou au staff */
		$errorFile = $error = false;
		// J'ai recu des données de formulaire
		if ( isset($_POST['send'])) {
			// je test si les champs sont valide
			if (isset($_POST['label']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_FILES['my-file']))	{
				// je test si les champs ne sont pas vides
				if (!empty($_POST['label']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_FILES['my-file'])) {
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
						    $path = 'assets/img/image_produits/' . $chemin;
						    $pathbd = 'img/image_produits/' . $chemin;
						    $label = $_POST['label'];
							$moved = move_uploaded_file($_FILES['my-file']['tmp_name'], $path);
							if(!$moved) {
								echo 'Erreur lors de l\'enregistrement';
							}
						}
					}
				} else {  
					$error = true;
				}
			}
		}

		if ($error || $errorFile ) {
			$produitsManager = new \Manager\produitsManager();
			$produits = $produitsManager->findAll("id");
			$this->show('produits/produits', ['produits'=>$produits, 'errorFile' => $errorFile, 'error' => $error]);
		}else{
			$produitsManager = New \Manager\produitsManager();
			$produits = $produitsManager->update_image_produit( $pathbd, $_REQUEST['label'], $_REQUEST['nom'], $_REQUEST['description'], $_REQUEST['select'] );
	/*		$this->show('produits/produits', ['image_produits'=>$produits]);*/
			$this->redirectToRoute('produits');
		}
	}
}