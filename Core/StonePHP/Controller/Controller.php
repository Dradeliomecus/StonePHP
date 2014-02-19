<?php

namespace Stone\Controller;

use Stone\Exceptions\UndifinedActionException;
use Stone\Exceptions\UndifinedControllerException;
use Stone\Exceptions\UndifinedModelException;

abstract class Controller{

	/**
	 * Controller's name
	 * 
	 * @var string
	 */
	private $name;

	/**
	 * Controller's View
	 * 
	 * @var Stone\View
	 */
	protected $View;

	/**
	 * Controller's models name
	 * 
	 * @var array
	 */
	protected $models = array();

	/**
	 * Creates a new Controller instance
	 * 
	 * @return void
	 */
	final public function __construct(){
		$this->name = substr(get_class($this), 0, -10); // The name is the class name without "Controller" (10 characters)
		$this->View = new View($this->name);

		$this->loadModels();

		$this->onLoad();
	}

	/**
	 * Renders the View (only if it has not been rendered before)
	 * 
	 * @return void
	 */
	final public function renderView(){
		$this->View->make();
	}

	/**
	 * Loads every models in Controller::$models
	 * 
	 * @return void
	 */
	final public function loadModels(){
		foreach($this->models as $k => $v){
			if(is_numeric($k)){
				$this->loadModel($v);
			}else{
				$this->loadModel($k, $v);
			}
		}
	}

	/**
	 * Loads a Model and injects it into the Controller as Controller::$alias
	 * 
	 * @param string $modelName
	 * @param string $alias
	 * @return void
	 */
	final public function loadModel($modelName, $alias = ''){
		if($alias == ''){
			$alias = $modelName;
		}

		if(!file_exists(MODEL.DS.$modelName.'.php')){
			throw new UndifinedModelException($modelName.'.php');
		}
		require_once MODEL.DS.$modelName.'.php';

		$model = 'App\Model\\'.$modelName;
		if(!class_exists($model)){
			throw new UndifinedModelException($model);
		}

		$this->$alias = new $model();
	}

	/**
	 * Defines what the Controller does after having been constructed
	 * 
	 * @return void
	 */
	protected function onLoad(){ }

	/**
	 * Calls the correct action in the controller passing the params
	 * 
	 * @param string $actionName
	 * @param array $params
	 * @return void
	 * 
	 * @throws UndifinedActionException
	 */
	final public function call($actionName, $params = array()){
		if(!method_exists($this, $actionName)){
			throw new UndifinedActionException($actionName, get_class($this));
		}

		call_user_func_array(array($this, $actionName), $params);
	}

	/**
	 * Loads and returns the correct Controller acording to the name
	 * 
	 * @param string $controllerName
	 * @return Stone\Controller
	 * 
	 * @throws UndifinedControllerException
	 */
	final public static function load($controllerName){
		if(is_string($controllerName)){
			$name = ucfirst(strtolower($controllerName)).'Controller';
			$file = CONTROLLER.DS.$name.'.php';

			if(!file_exists($file)){
				throw new UndifinedControllerException($name.'.php');
			}
			require_once CONTROLLER.DS.$name.'.php';

			$name = 'App\Controller\\'.$name;

			if(!class_exists($name)){
				throw new UndifinedControllerException($name);
			}

			return new $name();
		}
	}

	/**
	 * Returns the Controller's name
	 * 
	 * @return string
	 */
	final public function getName(){
		return $this->name;
	}

}