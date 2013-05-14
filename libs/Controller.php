<?php
class Controller{
	
	public $app;
	public $db;
	public $view;

	function __construct($app){
		$this->app=$app;

		$this->db = $this->app->db;
		$this->view = $this->app->view;

	}
}


?>