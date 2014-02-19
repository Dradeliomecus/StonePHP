<?php

namespace Stone\Controller;

use Stone\Support\File;

final class View{

	/**
	 * View's filename
	 * 
	 * @var string
	 */
	private $filename;

	/**
	 * View's layout name
	 * 
	 * @var string
	 */
	private $layout;

	/**
	 * View's variables sent
	 * 
	 * @var array
	 */
	private $vars = array();

	/**
	 * Has the View been rendered
	 * 
	 * @var boolean
	 */
	private $rendered;

	/**
	 * Creates a new View instance
	 * 
	 * @param string $filename
	 * @param string $layout
	 * @return void
	 */
	final public function __construct($filename = '', $layout = ''){
		$this->rendered = false;

		if($filename != ''){
			$this->setFilename($filename);
		}

		if($layout != ''){
			$this->setLayout($layout);
		}
	}

	/**
	 * Sends a variable to the view
	 */
	final public function send($var1, $var2){
		if(is_string($var1)){
			$this->vars[$var1] = $var2;
		}
	}

	/**
	 * Makes the view to render it
	 * 
	 * @return void
	 */
	final public function make(){
		if($this->rendered) return;

		$file = VIEW.DS.$this->filename.'.php';
		$layout = VIEW.DS.'layout'.DS.$this->layout.'.php';

		new ViewRenderer($this->vars, $file, $layout);
	}

	/**
	 * Sets the View's filename
	 * 
	 * @param string $filename
	 * @return void
	 */
	final public function setFileName($filename){
		$filename = str_replace('.', '/', File::removeExtension(strtolower($filename)));
		$this->filename = $filename;
	}

	/**
	 * Sets the View's layout
	 * 
	 * @param string $layout
	 * @return void
	 */
	final public function setLayout($layout){
		$this->layout = $layout;
	}

}