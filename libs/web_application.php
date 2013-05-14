<?php

require 'config.php';
require 'Database.php';
require 'Helpers.php';
require 'Bootstrap.php';
require 'Controller.php';
require 'View.php';


class web_application{

	public $db;
	public $bootstrap;
	public $view;
	public $conf;

	//constructor()
	function __construct(){

		global $config;
		$this->conf = $config;

		if($config['dbEnabled'] == true){
			$this->db = new Database($this);
			//$this->db->connect();
		}
		
		$this->view = new View($this);
		$this->bootstrap = new Bootstrap($config, $this);
	}
}

?>