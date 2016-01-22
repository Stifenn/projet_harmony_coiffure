<?php

namespace Controller;

use \W\Controller\Controller;

class GooglemapsController extends Controller
{
	public function Googlemaps()
	{
		$this->show('google/googleMaps');
	}
}