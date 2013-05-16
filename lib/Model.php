<?php

class Model{

	function __construct(){

	}

	function load($app){
		$this->db = $app->db;
		$this->view = $app->view;
		$this->conf = $app->conf;
		
		//Give model access to all other models (so long as it isn't this one)
		foreach($this->conf['models'] as $model){

			if($model != get_called_class()){
				echo "called from: ".get_called_class()." target: ".$model."<br />";
				$this->$model=$app->$model;
			}
		}
	}

}


?>