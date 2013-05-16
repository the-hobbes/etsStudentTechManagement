<?php

class Model{

	function __construct($app){
		$this->db = $app->db;
		$this->view = $app->view;
		$this->conf = $app->conf;

		//Give model access to all other models (so long as it isn't this one)
		foreach($this->conf['models'] as $model){
			if($model != get_called_class()){
				$this->$model=$app->$model;
			}
		}
	}

}


?>