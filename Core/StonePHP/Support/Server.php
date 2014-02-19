<?php

namespace Stone\Support;

use Stone\Exceptions\UndifinedIndexException;

final class Server{

	/**
	 * Returns a field from $_SERVER
	 * 
	 * @param string $index
	 * @return $_SERVER[$index]
	 * 
	 * @throws Stone\Exception\UndifinedIndexException
	 */
	final public static function get($index){
		if(!isset($_SERVER[$index])){
			throw new UndifinedIndexException('$_SERVER[\''.$index.'\']');
		}

		return $_SERVER[$index];
	}

}