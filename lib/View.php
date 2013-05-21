<?php

class View{
	
	public $data = array();
	public $db;
	public $view;
	
	function load($app){

		$this->db = $app->db;
		$this->view = $app->view;
		$this->conf = $app->conf;

		//Grab the models from the app so they can be used in view
		foreach($this->conf['models'] as $model){
			$this->$model=$app->$model;
		}
	}

	public function render($name, $data = null, $includeHeader = true){
		
			$this->data = $data;
			print_r($data);
			if($includeHeader == true){
				require 'views/header.php';
				require 'views/'.$name.'.php';
				require 'views/footer.php';
				
			}else{
				require 'views/'.$name.'.php';
			}		
	}
	
	//Return the view as a variable instead of loading it
	public function renderVariable($name){
		
		ob_start();
		require 'views/'.$name.'.php';
		return ob_get_clean();	
	}
	
}


?>

