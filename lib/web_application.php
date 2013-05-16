<?php

require 'config.php';
require 'Database.php';
require 'Helpers.php';
require 'Bootstrap.php';
require 'Controller.php';
require 'View.php';
require 'Model.php';


class web_application{

	public $db;
	public $bootstrap;
	public $view;
	public $conf;
	public $test;

	//constructor()
	function __construct(){
	
		global $config;
		$this->conf = $config;

		if($config['dbEnabled'] == true){
			$this->db = new Database($this);
		}
		
		//Create the view object
		$this->view = new View();

		//load the models
		$this->loadModels();

		//Load data into View object
		$this->view->load($this);

		$this->bootstrap = new Bootstrap($config, $this);
	}

	//loadModels(): require each model that is in the config
	function loadModels(){
	
		foreach($this->conf['models'] as $model){
			require ABS_PATH.'models/'.$model.'.php';
			$this->$model = new $model;
		}//end foreach

		foreach($this->conf['models'] as $model){
			//Load the app data into the models
			$this->$model->load($this);
		}

	}//end: loadModels()
}//end: web_application

?>