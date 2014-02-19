<?php

namespace Stone\Exceptions;

final class UndifinedControllerException extends \Exception{

	/**
	 * Creates a new UndifinedControllerException instance
	 * 
	 * @param string $controllerName
	 * @param int $code
	 * @param Exception $previous
	 * @return void
	 */
	final public function __construct($controllerName, $code = 0, Exception $previous = null){
		$message = 'Undifined controller "'.$controllerName.'"';

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