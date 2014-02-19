<?php

namespace Stone\Exceptions;

final class UndifinedIndexException extends \Exception{

	/**
	 * Creates a new UndifinedIndexException instance
	 * 
	 * @param string $message
	 * @param int $code
	 * @param Exception $previous
	 * @return void
	 */
	final public function __construct($message, $code = 0, Exception $previous = null){
		$message = 'Undifined index '.$message;

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