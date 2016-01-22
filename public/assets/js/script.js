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
});