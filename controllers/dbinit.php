<?php

class dbinit extends Controller{
		
	function __construct($app){
		parent::__construct($app);
	}

	function index(){
		$data['house'] = 'derpderp';
		$this->view->render('view_dbinit');
	}

	function herp(){
		echo 'derp';
	}
}


?>