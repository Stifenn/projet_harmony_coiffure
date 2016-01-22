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
		['POST', 		'/admin/statut/[:id]', 			'Commentaires#modifierCommentaires', 		'modifier_commentaires']
		

	);