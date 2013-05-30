<?php
class Controller{
	
	public $app;
	public $db;
	public $view;

	//Load the application for use
	function load($app){
		$this->app=$app;
		$this->conf=$app->conf;
		$this->session=$app->session;
		$this->userValid = $app->userValid;
		$this->db = $this->app->db;
		$this->view = $this->app->view;

		//Grab the models from the app so they can be used in view
		foreach($this->conf['models'] as $model){
			$this->$model=$app->$model;
		}
	}
}


?>