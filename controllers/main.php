<?php

class Main extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->render('view_main');
	}

	
}


?>