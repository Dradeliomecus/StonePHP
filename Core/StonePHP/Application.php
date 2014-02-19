<?php

namespace Stone;

use Stone\Controller\Controller;
use Stone\Exceptions\UndifinedActionException;
use Stone\Exceptions\UndifinedControllerException;
use Stone\Routing\Request;
use Stone\Routing\Router;

final class Application{

	/**
	 * User's request (url)
	 * 
	 * @var Stone\Routing\Request
	 */
	private $request;

	/**
	 * Controller used
	 * 
	 * @var Stone\Controller
	 */
	private $controller;

	/**
	 * Creates a new Application instance
	 * 
	 * @return void
	 */
	final public function __construct(){
		$this->request = new Request();
	}

	/**
	 * Starts the Application to start StonePHP
	 * 
	 * @return void
	 */
	final public function start(){
		$parsedURL = Router::parse($this->request);

		$this->controller = Controller::load($parsedURL['controller']);

		$this->controller->call($parsedURL['action'], $parsedURL['params']);
	}

}