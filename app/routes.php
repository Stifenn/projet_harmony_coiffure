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
		['GET', 		'/gestion', 					'Default#gestion', 							'gestion'],
		['GET|POST', 	'/creation/compte', 			'User#create_user', 						'create_user'],

	
		
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
	);