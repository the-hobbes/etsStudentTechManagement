<?php

class People extends Controller{
		
	function __construct($app){
		parent::__construct($app);
	}

	function index(){
		$this->view->render("view_people");	
	}
}

?>