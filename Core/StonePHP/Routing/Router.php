<?php

namespace Stone\Routing;

final class Router{

	/**
	 * Parses an URL
	 * 
	 * @param Stone\Routing\Request $request
	 * @return array $parsedURL
	 */
	final public static function parse(Request $request){
		$parsedURL = array(
			'controller'=> '',
			'action'	=> 'index',
			'params'	=> []
		);
		$url = trim($request->getURL(), '/');

		$explode = explode('/', $url);

		if(isset($explode[0])){
			$parsedURL['controller'] = $explode[0];
		}

		if(isset($explode[1])){
			$parsedURL['action'] = $explode[1];
		}

		if(isset($explode[2])){
			$parsedURL['params'] = array_slice($explode, 2);
		}

		return $parsedURL;
	}

}