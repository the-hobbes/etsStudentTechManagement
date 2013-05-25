<?php

require 'AppLoader.php';
require 'Database.php';
require 'Session.php';
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

	//constructor()
	function __construct($config){

		$this->conf = $config;

		if($config['dbEnabled'] == true){
			$this->db = new Database($this);
		}
		
		//Create the session object
		$this->session = new Session();

		//Create the view object
		$this->view = new View();

		//load the models
		$this->loadModels();

		//Load app into objects
		$this->session->loadApp($this);
		$this->setUser();

		$this->view->load($this);
		
		//Start the bootstrap, which handles url forwarding to controllers and methods
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

	//setUser(): get the user and set session (either from ldap or wherever else)
	function setUser(){

		//hard set the user for development
		$this->session->setUser("devuser");

		//check if the user if valid and set valid flag
		$this->userValid = $this->session->isAuthorized();
	}
}//end: web_application

?>