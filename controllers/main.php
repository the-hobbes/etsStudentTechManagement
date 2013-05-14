<?php

class Main extends Controller{
	
	function __construct(){
		parent::__construct();
		
	}

	function index(){
		$this->view->render('view_main', "", false);
	}


	function derp(){
		echo 'derp';
	}	
}


?>