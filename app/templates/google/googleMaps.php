<?php $this->layout('layout', ['title' => 'GoogleMap']) ?>

<?php $this->start('google') ?>

<title>Travel modes in directions</title>

    <div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
    </select>
    </div>
    <div id="map"  onload="initMap()"></div>
    
<?php $this->stop('google') ?>