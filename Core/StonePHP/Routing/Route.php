<?php

namespace Stone\Routing;

final class Route{

	/**
	 * Contains all the application routes
	 * 
	 * @var array
	 */
	private static $routes = array();

	/**
	 * Route used if in GET and if $route matches
	 * 
	 * @param string $route
	 * @param string $controller (format: controller.action)
	 * @param array $params
	 * @return void
	 */
	final public static function get($route, $controller, $params = array()){
		if(Request::getMethod() == 'GET'){
			self::all($route, $controller, $params);
		}
	}

	/**
	 * Route used if in POST and if $route matches
	 * 
	 * @param string $route
	 * @param string $controller (format: controller.action)
	 * @param array $params
	 * @return void
	 */
	final public static function post($route, $controller, $params = array()){
		if(Request::getMethod() == 'POST'){
			self::all($route, $controller, $params);
		}
	}

	/**
	 * Route used if $route matches
	 * 
	 * @param string $route
	 * @param string $controller (format: controller.action)
	 * @param array $params
	 * @return void
	 */
	final public static function all($route, $controller, $params = array()){
		if(is_string($route) && is_string($controller) && is_array($params)){
			$routes = self::generateRoutes($route, $params);
			$explode = explode('.', $controller);
			foreach($routes as $v){
				self::$routes[$v] = array(
					'controller'=> substr($explode[0], 0, -10),	// Get ride of 'Controller' at the end
					'action'	=> isset($explode[1])  ? $explode[1] : 'index',
					'params'	=> $params
				);
			}
		}
	}

	/**
	 * Generates all possible routes from the route and its params
	 * 
	 * @param string $route
	 * @param array $params
	 * @return array $routes
	 */
	final private static function generateRoutes($route, $params){
		$routes = array('\/');

		$explode = explode('/', $route);
		foreach($explode as $v){if(isset($v[0])){
			if($v[0] == '?'){
				$varName = substr($v, 1);
				foreach($routes as $vv){
					if(isset($params[$varName])){
						$routes[] = $vv.$params[$varName].'\/';
					}else{
						$route[] = $vv.'(a-zA-Z0-9\-_)+\/';
					}
				}
			}else if($v[0] == '&'){
				$varName = substr($v, 1);
				if(isset($params[$varName])){
					for($i = 0; $i < count($routes); $i++){
						$routes[$i] .= $params[$varName].'\/';
					}
				}else{
					for($i = 0; $i < count($routes); $i++){
						$routes[$i] .= '(a-zA-Z0-9\-_)+\/';
					}
				}
			}else{
				for($i = 0; $i < count($routes); $i++){
					$routes[$i] .= $v.'\/';
				}
			}
		}}

		for($i = 0; $i < count($routes); $i++){
			if(strlen($routes[$i]) > 2 && substr($routes[$i], -2 == '\/')){
				$routes[$i] = substr($routes[$i], 0, -2);
			}
		}

		return $routes;
	}

	/**
	 * Returns all the routes
	 * 
	 * @return array $routes
	 */
	final public static function getRoutes(){
		return self::$routes;
	}

}