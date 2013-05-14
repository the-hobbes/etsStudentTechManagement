<?php

class View{
	
	public $data = array();
	
	
	function __construct(){
	
	}
	
	public function render($name, $data = false, $noInclude = false){
		
			$this->data = $data;
			
			if($noInclude == false){
				require 'views/header.php';
				require 'views/'.$name.'.php';
				require 'views/footer.php';
				
			}else{
				require 'views/'.$name.'.php';
			}		
	}
	
	public function renderVariable($name){
		
		ob_start();
		require 'views/'.$name.'.php';
		return ob_get_clean();	
	}
	
}


?>

