<?php

namespace Stone\Exceptions;

final class UndifinedModelException extends \Exception{

	/**
	 * Creates a new UndifinedModelException instance
	 * 
	 * @param string $modelName
	 * @param int $code
	 * @param Exception $previous
	 * @return void
	 */
	final public function __construct($modelName, $code = 0, Exception $previous = null){
		$message = 'Undifined model "'.$modelName.'"';

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