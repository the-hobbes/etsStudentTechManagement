<?php

class View{
	
	public $data = array();
	public $db;
	public $view;
	
	function __construct($app){
		$this->db = $app->db;
		$this->view = $app->view;
	}
	
	public function render($name, $data = false, $includeHeader = true){
		
			$this->data = $data;
			
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

