$(function(){

  if(navigator.geolocation)
    {
      navigator.geolocation.getCurrentPosition(initMap,errorCallback);
    }
    else
    {
      alert('Votre navigateur ne prend malheureusement pas en charge la géolocalisation.');
    }

  function errorCallback(error){
    switch(error.code)
    {
      case error.PERMISSION_DENIED:
        alert("L'utilisateur n'a pas autorisé l'accès à sa position");
        break;      
      case error.POSITION_UNAVAILABLE:
        alert("L'emplacement de l'utilisateur n'a pas pu être déterminé");
        break;
      case error.TIMEOUT:
        alert("Le service n'a pas répondu à temps");
        break;
    }
  }

  function initMap(position) 
  {
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: {lat: 49.3119531, lng: 5.7818441}
   });

    directionsDisplay.setMap(map);

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    console.log(latitude,longitude);
    calculateAndDisplayRoute(directionsService, directionsDisplay,latitude,longitude);
    document.getElementById('mode').addEventListener('change', function() {
      calculateAndDisplayRoute(directionsService, directionsDisplay,latitude,longitude);
    });
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay,latitude,longitude) 
  {
    var selectedMode = document.getElementById('mode').value;
    directionsService.route({
      origin: {lat: latitude, lng: longitude},  // coordonnee utilisateur.
      destination: {lat: 49.3119531,lng: 5.7818441},  // Harmony coiffure.
      // Note that Javascript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      travelMode: google.maps.TravelMode[selectedMode]
    }, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });

  }

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
    // si coché
    if ( "#checkboxlost"['checked'] ) {
      $('#lost-pass').show();

    // si non coché
    } else if ( $(this).val() == 'non' ) {
      $('#lost-pass').hide();
      }
  });


});