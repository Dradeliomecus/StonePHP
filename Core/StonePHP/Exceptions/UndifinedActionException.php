<?php

namespace Stone\Exceptions;

final class UndifinedActionException extends \Exception{

	/**
	 * Creates a new UndifinedControllerException instance
	 * 
	 * @param string $actionName
	 * @param string $controllerName
	 * @param int $code
	 * @param Exception $previous
	 * @return void
	 */
	final public function __construct($actionName, $controllerName, $code = 0, Exception $previous = null){
		$message = 'Undifined action '.$controllerName.'::'.$actionName;

		parent::__construct($message, $code, $previous);
	}

	/**
	 * Returns a string to describe the class
	 * 
	 * @return string
	 */
	final public function __toString(){
		return __CLASS__.': ['.$this->code.']: ['.$this->message.']\n';
	}

}