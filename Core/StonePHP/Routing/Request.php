<?php

namespace Stone\Routing;

use Stone\Exceptions\UndifinedIndexException;
use Stone\Support\Server;

use App\Configuration\Config;

final class Request{

	/**
	 * URL called by the user
	 * 
	 * @var string
	 */
	private static $url;

	/**
	 * Method used to load the page (GET, POS, DELETE...)
	 * 
	 * @var string
	 */
	private static $method;

	/**
	 * Initializes the user request
	 * 
	 * @return void
	 */
	final public static function init(){
		self::$url = self::loadURL();
		self::$method = self::loadMethod();
	}

	/**
	 * Returns the loaded URL from the server
	 * 
	 * @return string
	 */
	final private static function loadURL(){
		try{
			return Server::get('REQUEST_URI');
		}catch(UndifinedIndexException $e){
			try{
				return Server::get('REDIRECT_URL');
			}catch(UndifinedIndexException $e){
				if(Config::DEBUG == 0){
					die('<p>An error occured, the web page could not load. <br /> A server variable is missing.</p>');
				}else{
					echo '<h2>Sorry, StonePHP could not find the called URL on this server.</h2>';
					echo '<p>Please contact the StonePHP\'s support and send your $_SERVER datas</p>';
					echo '<p>Error occured in file '.__FILE__.' at line '.__LINE__.'</p>';
					die();
				}
			}
		}
	}

	/**
	 * Returns the loaded mode from the server
	 * 
	 * @return string
	 */
	final private static function loadMethod(){
		try{
			return Server::get('REQUEST_METHOD');
		}catch(UndifinedIndexException $e){
				if(Config::DEBUG == 0){
					die('<p>An error occured, the web page could not load. <br /> A server variable is missing.</p>');
				}else{
					echo '<h2>Sorry, StonePHP could not find the method called on this server.</h2>';
					echo '<p>Please contact the StonePHP\'s support and send your $_SERVER datas</p>';
					echo '<p>Error occured in file '.__FILE__.' at line '.__LINE__.'</p>';
					die();
				}
			}
	}

	/**
	 * Returns the Request's URL
	 * 
	 * @return string
	 */
	final public static function getURL(){
		return self::$url;
	}

	/**
	 * Returns the Request's method
	 * 
	 * @return string
	 */
	final public static function getMethod(){
		return self::$method;
	}

}