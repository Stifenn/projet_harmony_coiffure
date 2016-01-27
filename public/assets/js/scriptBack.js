$(function(){
	console.log('DOMContentLoaded : OK');

	// fonction sur le changement du select id #select-role dans manage.php
	$('#select-role').change(function() {
		// si la valeur de l'option est staff
		if ( $(this).val() == 'staff' ) {
			$('#email').show();
			$('#password').show();
			$('#password-confirm').show();
		// si la valeur de l'option est client
		} else if ( $(this).val() == 'client' ) {
			$('#email').hide();
			$('#password').hide();
			$('#password-confirm').hide();
		}
	});

	// fonction pour la confirmation sur la suppression d'un compte par l'admin
	$(".delete-account").click(function(e) {
		result = confirm('Voulez-vous vraiment supprimer cet utilisateur ?');
		if (!result) {
			// si réponse est "non", on arrête
			e.preventDefault();
		};
	});
	
/*fancybox pour */


	$(".fancybox")
	    .attr('rel', 'gallery')
	    .fancybox({
	        beforeLoad: function() {
	            var el, id = $(this.element).data('title-id');

	            if (id) {
	                el = $('#' + id);
	            
	                if (el.length) {
	                    this.title = el.html();
		            }
		        }
		    }
	    });

/*var $form = $('#form');
	
	$('#send').on('click', function() {
		$form.trigger('submit');
		return false;
	});
	
	$form.on('submit', function() {
		
		var label = $('#label').val();

		
		if(label == '') {
			alert('Les champs doivent êtres remplis');
		} else {
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				contentType: false, // obligatoire pour de l'upload
            	processData: false, // obligatoire pour de l'upload
				data: $(this).serialize(),
				dataType: 'json',
				success: function(json) {
					if(json.reponse == 'ok') {
						alert('Tout est bon');
					} else {
						alert('Erreur : '+ json.reponse);
					}
				}
			});
		}
		return false;
	});*/
	
    $('#form').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
 
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'json', // selon le retour attendu
            data: data,
            success: function (response) {
                if(json.reponse == 'ok') {
					// La réponse du serveur
            	}
        	}
    	})
	})
})