<h1>Pour me joindre</h1>
<p>Nom + Prénom</p>
<p>Adresse : </p>
<p>Tel : </p>
<p>email :</p>

<?php
	if(isset($_POST) && !empty($_POST)){
	$adresse = urlencode($_POST['adresse']);
	$ville = urlencode($_POST['ville']);
	$pays = urlencode($_POST['pays']);

	$key = 'AIzaSyCLouoCGsnPeEpn8J13E94xd7F_OgXYCN4';
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$adresse.",".$ville.",". $pays ."&key=" . $key;
	
	$responseJSON = file_get_contents($url);
	$response = json_decode($responseJSON);
	
	if($response->status == 'OK') {

		$lat = $response->results[0]->geometry->location->lat;
		$lon = $response->results[0]->geometry->location->lng;
		echo $lat . ' ' . $lon;
		updateLat($pdo, $lat);
		updateLon($pdo, $lon);

	} 
}else {
		$lat = $resulat[0]['value'];
		$lon = $resulat[1]['value'];
	} 
	
?>

<script>
  		google.maps.event.addDomListener(window, 'load',
        function(){initMap(<?php echo $lat . ',' . $lon ?>)});
        // $(document).ready(function(){inistMap()
        // });</script>
<div id="map">
  </div>

  <form action="#" method="post" accept-charset="utf-8">
  	<input type="text" name="adresse" placeholder="adresse">
  	<input type="text" name="ville"  placeholder="ville">
  	<input type="text" name="pays"  placeholder="pays">
  	<button type="submit" name="sent">Envoyer</button>
  </form>