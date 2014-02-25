<?php

namespace App\Configuration;

final class Config{

	/**
	 * Defines whever or not you want to use filp/whoops
	 * 
	 * @var boolean
	 */
	const USE_WHOOPS = true;

	/**
	 * Defines how the application is going to debug an error
	 * 0 = no debug, use for production
	 * 1 = small debug
	 * 2 = full debug, use for development
	 * 
	 * @var int [0 ; 2]
	 */
	const DEBUG = 2;

}