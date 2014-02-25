<?php

namespace Stone\Routing;

final class Router{

	/**
	 * Parses an URL
	 * 
	 * @param string $requestURL
	 * @return array $parsedURL
	 */
	final public static function parse($requestURL){
		$parsedURL = array(
			'controller'=> '',
			'action'	=> 'index',
			'params'	=> []
		);
		$url = trim($requestURL, '/');

		$explode = explode('/', $url);

		$routes = Route::getRoutes();

		foreach($routes as $route => $params){
			if(preg_match('/^'.$route.'$/', $requestURL)){
				return $params;
			}
		}

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