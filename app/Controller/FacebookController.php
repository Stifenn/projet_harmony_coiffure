<?php 

namespace Controller;

use \W\Controller\Controller;

class FacebookController extends Controller
{
	public function facebook()
	{
		$this->show('facebook/facebook');
	}
}