<?php
class Controller{
	
	public $app;
	public $db;
	public $view;

	function __construct($app){
		$this->app=$app;
		$this->conf=$app->conf;

		$this->db = $this->app->db;
		$this->view = $this->app->view;

		//Grab the models from the app so they can be used in view
		foreach($this->conf['models'] as $model){
			$this->$model=$app->$model;
		}

	}
}


?>