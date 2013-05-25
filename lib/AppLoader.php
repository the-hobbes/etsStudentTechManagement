<?php
class AppLoader{

	function loadApp($app){
		$this->conf = $app->conf;
		$this->db   = $app->db;
		
		//Load the Models
		foreach($this->conf['models'] as $model){
			$this->$model=$app->$model;
		}
	}

}
?>