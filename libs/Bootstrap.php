<?php

class Bootstrap{
	
	function __construct($config){
		
		//Grab the URL and split it by the '/' delimiters
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = explode('/', $url);			
		}else{
			$url[0] = "";
		}
		//Set the path of the controller file based off of the first portion of the URL	
		$controller_file = 'controllers/'.$url[0].'.php';	
		
		//Check to see if controller exists
		if(file_exists($controller_file)){
	
			//It exists, let's require it.
			require $controller_file;	
			$class = $url[0];
			
		}else{
			
			switch($url[0]){
				case "":
					
					//URL is empty. Default controller
					require 'controllers/'.$config['default_controller'].'.php';
					$class = $config['default_controller'];
					break;
				
				default:
					
					//File does not exists, require error controller
					require 'controllers/error.php';
					$class = 'error';
					break;
				
			}//end: switch
			
		}//end: else
		
		//Instantiate
		$controller = new $class;
		
		/*
		 * Handle Methods and arguments
		 */
		 if(isset($url[1])){
		 	
			//Every URL piece after the 2nd is a parameter to the method. Check if it is set and split into array
			if(isset($url[2])){
				$parameters = array_slice($url, 2);	
				
				//Piece together a string for the method parameter
				foreach($parameters as $parameter){
		 			$param_string = $param_string.$parameter.',';  
		 		}
					$param_string = rtrim($param_string, ',');		
				
				//Call method with parameters
				$controller->{$url[1]}($param_string);
				
			}else{
				
				//Call the method without any parameters
				$controller->{$url[1]}();
				
			}//end: else
		 }else{
		 	if($class!='error'){
		 		//No methods called, call the default index()
		 		$controller->index();
		 	}
		 }

		 //end: if
	}//end: __construct
	
}


?>