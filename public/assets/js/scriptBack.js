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
});

