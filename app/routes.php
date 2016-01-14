<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		
		//Routes pour la page tarifs

		['GET','/administration/tarifs', 'Tarifs#tarifs' , 'administration_tarifs'],
		['POST','/admnistration/modifier/[:id]','Tarifs#modifierTarifs','modifier_tarifs'],
		['POST', '/administration/ajouter', 'Tarifs#ajoutertarifs','ajouter_tarifs'],

		//Routes pour la page commentaires

		['GET','/administration/commentaires', 'Commentaires#Commentaires','administration_commentaires'],
		['POST', '/administration/statut/[:id]', 'Commentaires#modifierCommentaires', 'modifier_commentaires']
		
	);