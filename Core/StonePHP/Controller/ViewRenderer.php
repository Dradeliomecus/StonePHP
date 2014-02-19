<?php

namespace Stone\Controller;

final class ViewRenderer{

	/**
	 * Every View's blocs
	 * 
	 * @var array
	 */
	private $blocs = array();

	/**
	 * Current bloc using
	 * 
	 * @var string
	 */
	private $currentBloc;

	/**
	 * Creates a new ViewRenderer instance
	 * 
	 * @param array $vars
	 * @param string $file
	 * @param string $layout
	 * @return void
	 */
	final public function __construct($vars, $file, $layout){
		$this->currentBloc = '';
		extract($vars);
		require $file;
		require $layout;
	}

	/**
	 * Creates a new buffer to put the code in it
	 * 
	 * @param string $name
	 * @return void
	 */
	final private function bloc($name){
		if(is_string($name)){
			$this->currentBloc = $name;
			ob_start();
		}
	}

	/**
	 * Ends the buffer
	 * 
	 * @return void
	 */
	final private function end(){
		$this->blocs[$this->currentBloc] = ob_get_contents();
		$this->currentBloc = '';
		ob_end_clean();
	}

	/**
	 * Gets the content of a buffer
	 * 
	 * @param string $name
	 * @return string
	 */
	final private function get($name){
		if(is_string($name)){
			return $this->blocs[$name];
		}
		return 'Undifined bloc: '.$name;
	}

}