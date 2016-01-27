<?php
	
	$w_routes = array(


		['GET', 		'/', 							'Default#home', 							'home'],
		/*Slider*/
		['GET', 		'/admin/slider',	 			'images_sliders#slider', 					'slider'],
		['POST', 		'/admin/slidersubmit', 			'images_sliders#insert_image_slider',		'slidersubmit'],
		['POST', 		'/admin/sliderdelete', 			'images_sliders#delete_image_slider',		'sliderdelete'],

		/*lookbook*/
		['GET', 		'/admin/lookbook',	 			'images_lookbooks#lookbook', 				'lookbook'],
		['POST', 		'/admin/lookbooksubmit', 		'images_lookbooks#insert_image_lookbook',	'lookbooksubmit'],
		['POST', 		'/admin/lookbookdelete', 		'images_lookbooks#delete_image_lookbook',	'lookbookdelete'],

		/* user connexion */
		['GET|POST', 	'/login', 						'Default#login', 							'login'],
		['GET', 		'/logoff', 						'Default#logoff', 							'logoff'],
		
		/* acces a l'adminisatration */
		['GET', 		'/admin', 						'Default#admin', 							'admin'],
		
		/* user création de compte ou récupération */
		['GET|POST', 	'/creation/compte', 			'User#createUser', 							'create_user'],
		['POST', 		'/creation/compte/recup', 		'User#recupUser', 							'recup_user'],
		['POST', 		'/creation/compte/recup/[:id]', 'User#updateRecupUser', 					'update_recup_user'],
		
		/* acces à son profil, modification, suppression */
		['GET', 		'/profil', 						'User#profil', 								'profil'],
		['POST', 		'/profil/update/[:id]', 		'User#updateUser', 							'update_user'],
		['POST', 		'/profil/delete/[:id]', 		'User#deleteUser', 							'delete_user'],

		/* admin ou staff, gestion et création de compte */
		['GET|POST', 	'/admin/comptes', 				'User#manage', 								'manage'],
		['POST', 		'/admin/comptes/create', 		'User#userCreate', 							'user_create'],
		['GET', 		'/admin/comptes/delete/[:id]', 	'User#userDelete', 							'user_delete'],
		
		/*Routes pour la page tarifs*/
		['GET',			'/admin/tarifs', 				'Tarifs#tarifs' , 							'administration_tarifs'],
		['POST',		'/admin/modifier/[:id]', 		'Tarifs#modifierTarifs',					'modifier_tarifs'],
		['POST', 		'/admin/ajouter', 				'Tarifs#ajoutertarifs',						'ajouter_tarifs'],

		/*Routes pour la page commentaires*/
		['GET',			'/admin/commentaires', 			'Commentaires#Commentaires',				'administration_commentaires'],
		['POST', 		'/admin/statut/[:id]', 			'Commentaires#modifierCommentaires', 		'modifier_commentaires'],


		/*Routes pour la partie fiche client*/
		['GET|POST', 	'/admin/recherche',				'User#recherche',							'recherche'],
		['GET', 		'/admin/fiche/[:id]',			'Fiches_rdvs#fichesclient',					'fiche_client'],
		['GET|POST',	'/admin/fiche/ajout',			'Fiches_rdvs#ajoutFiche',					'ajout_fiche'],
		['GET|POST',	'/admin/fiche/modif/[:id]',		'Prestations#modifFiche',					'modif_fiche'],
		['GET|POST',	'/admin/prestation/ajout',     	'Prestations#prestation',					'prestation'],

		['GET',			'/google',						'GoogleMaps#googlemaps',						'googlemap'],
		
		/*ajout et suppression d'image_produits*/
		['GET', 		'/admin/produits',	 			'produits#produits', 						'produits'],
		['POST', 		'/admin/produitssubmit', 		'produits#insert_produits',					'produitssubmit'],
		['POST', 		'/admin/produitsdelete', 		'produits#delete_produits',					'produitsdelete'],

		/*ajout et suppression des images de la page de présentation du site*/
		['GET', 		'/admin/images_sites',	 			'images_sites#images', 					'images'],
		['POST', 		'/admin/images_sitessubmit', 		'images_sites#insert_images_sites',		'imagessubmit'],
		['POST', 		'/admin/images_sitesdelete', 		'images_sites#delete_images_sites',		'imagesdelete'],


	
	);