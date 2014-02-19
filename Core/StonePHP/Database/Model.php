<?php

namespace Stone\Database;

abstract class Model{

	/**
	 * Creates a new Model instance
	 */
	final public function __construct(){
		
	}

	final public function all(){
		return array(
			array(
				'name'		=> 'Un titre bidon',
				'content'	=> 'Un contenu qui me dit que je dois faire ma classe Stone\Database\Model'
			)
		);
	}

}