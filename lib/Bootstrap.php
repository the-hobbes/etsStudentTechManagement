<?php

class Bootstrap{
	
	function __construct($config, $app){
		
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
		$controller->load($app);
		
		/*
		 * Handle Methods and arguments
		 */
		 if(isset($url[1])){
		 	
			//Every URL piece after the 2nd is a parameter to the method. Check if it is set and split into array
			if(isset($url[2])){
				$parameters = array_slice($url, 2);	
				$numParams = sizeof($parameters);
				
				switch($numParams){
					case 1:
						$controller->{$url[1]}($parameters[0]);
						break;
					case 2:
						$controller->{$url[1]}($parameters[0], $parameters[1]);
						break;
					case 3:
						$controller->{$url[1]}($parameters[0], $parameters[1], $parameters[2]);
						break;
					case 4:
						$controller->{$url[1]}($parameters[0], $parameters[1], $parameters[2], $parameters[3]);
						break;
				}

				//Call method with parameters
				
				
			}else{
				
				//Call the method without any parameters
				$controller->{$url[1]}();
				
			}//end: else
		 }else{
	 		//No methods called, call the default index()
	 		$controller->index();
		 	
		 }

		 //end: if
	}//end: __construct
	
}


?>