$(function(){
	console.log('DOMContentLoaded : OK');

	// fonction pour la confirmation sur la suppression d'un compte par l'utilisateur (client)
	$("#delete-client").click(function(e) {
		result = confirm('Voulez-vous vraiment supprimer votre compte ?');
		if (!result) {
			// si réponse est "non", on arrête
			e.preventDefault();
		};
	});

	// fonction qui affime l'un ou l'autre formulaire de create_user.php
	$(".choix").click(function() {
		// si la valeur est oui
		if ( $(this).val() == 'oui' ) {
			$('#recup-compte').show();
			$('#create-compte').hide();

		// si la valeur est non
		} else if ( $(this).val() == 'non' ) {
			$('#recup-compte').hide();
			$('#create-compte').show();
		}
	});

});