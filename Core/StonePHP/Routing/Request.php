<?php

namespace Stone\Routing;

use Stone\Exceptions\UndifinedIndexException;
use Stone\Support\Server;

final class Request{

	/**
	 * URL called by the user
	 * 
	 * @var string
	 */
	private $url;

	/**
	 * Creates a new Request instance
	 * 
	 * @return void
	 */
	final public function __construct(){
		$this->url = $this->loadURL();
	}

	/**
	 * Returns the loaded URL from the server
	 * 
	 * @return string
	 */
	final private function loadURL(){
		try{
			return Server::get('REQUEST_URI');
		}catch(UndifinedIndexException $e){
			try{
				return Server::get('REDIRECT_URL');
			}catch(UndifinedIndexException $e){
				echo '<h2>Sorry, StonePHP could not find the called URL on this server.</h2>';
				echo '<p>Please contact the StonePHP\'s support and send your $_SERVER datas</p>';
				die();
			}
		}
	}

	/**
	 * Returns the Request's URL
	 * 
	 * @return string $url
	 */
	final public function getURL(){
		return $this->url;
	}

}