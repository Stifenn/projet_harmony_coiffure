<?php
	
	$w_routes = array(

		['GET', 		'/', 							'Default#home', 							'home'],

		/*Slider*/
		['GET', 		'/slider',	 					'images_sliders#slider', 					'slider'],
		['POST', 		'/slidersubmit', 				'images_sliders#insert_image_slider',		'slidersubmit'],
		['POST', 		'/sliderdelete', 				'images_sliders#delete_image_slider',		'sliderdelete'],

		/*lookbook*/
		['GET', 		'/lookbook',	 				'images_lookbooks#lookbook', 				'lookbook'],
		['POST', 		'/lookbooksubmit', 				'images_lookbooks#insert_image_lookbook',	'lookbooksubmit'],
		['POST', 		'/lookbookdelete', 				'images_lookbooks#delete_image_lookbook',	'lookbookdelete'],

		/* user connexion */
		['GET|POST', 	'/login', 						'Default#login', 							'login'],
		['GET', 		'/logoff', 						'Default#logoff', 							'logoff'],
		['GET', 		'/gestion', 					'Default#gestion', 							'gestion'],
		['GET|POST', 	'/creation/compte', 			'User#create_user', 						'create_user'],
	);