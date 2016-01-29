$(function(){
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

  // fonction qui affiche ou non le formulaire de mot de passe perdu dans login.php
  $("#checkboxlost").click(function() {
    $('#lost-pass').toggle();

  });

  // fonction qui affiche ou non le bandau de "profil" et change le bouton
  $("#control").click(function() {
    $('#user').toggle();
    $('#glyph-left').toggle();
    $('#glyph-right').toggle();


  });

});