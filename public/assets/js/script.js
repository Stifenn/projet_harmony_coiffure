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

});