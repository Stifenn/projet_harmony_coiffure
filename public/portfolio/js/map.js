function initMap(lat, lon) {
			var latLng = new google.maps.LatLng(lat, lon);
			var myOptions = {
				zoom : 13,
				center : latLng,
			}
			var myMap = new google.maps.Map(document.getElementById('map'), myOptions);

			var marker = new google.maps.Marker({
					position: latLng,
					map:myMap,
				});
		}
		