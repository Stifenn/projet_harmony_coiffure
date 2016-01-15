<?php
	
	$w_routes = array(
		['GET', 		'/', 				'Default#home', 	'home'],
		['GET|POST', 	'/login', 			'Default#login', 	'login'],
		['GET', 		'/logoff', 			'Default#logoff', 	'logoff'],
		['GET', 		'/gestion', 		'Default#gestion', 	'gestion'],

		['GET|POST', 	'/creation/compte', 'User#create_user', 'create_user'],
	);