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

		//load the models
		$this->loadModels();

		if($config['dbEnabled'] == true){
			$this->db = new Database($this);
		}
		
		$this->view = new View($this);
		$this->bootstrap = new Bootstrap($config, $this);
	}

	//loadModels(): require each model that is in the config
	function loadModels(){
	
		foreach($this->conf['models'] as $model){
			require ABS_PATH.'models/'.$model.'.php';
			$this->$model = new $model($this);
		}//end foreach

	}//end: loadModels()
}//end: web_application

?>