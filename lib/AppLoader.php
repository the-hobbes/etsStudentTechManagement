<?php
class AppLoader{

	function loadApp($app){
		$this->conf = $app->conf;

		//Load the Models
		foreach($this->conf['models'] as $model){
			$this->$model=$app->$model;
		}
	}

}
?>