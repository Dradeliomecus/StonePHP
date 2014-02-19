<?php

namespace App\Controller;

use Stone\Controller\Controller;

abstract class AppController extends Controller{

	/**
	 * Overrides Controller::onLoad
	 */
	public function onLoad(){
		$this->View->setLayout('default');
	}

}