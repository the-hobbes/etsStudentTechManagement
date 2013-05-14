<?php

class Main extends Controller{
	
	function __construct($app){
		parent::__construct($app);
	}

	//index(): Default method. Called when you access controller with no method calls
	function index(){
		$data['test']="lol";
		$data['tblfield'] = 'woop';

		//Load the view. params = viewfile, optional data, optional flag. Data becomes accessible in view.
		//false flag indicates not to load header and footer
		$this->view->render('view_main', $data, true);
	}

	//derp(): called from localhost/ETS/main/derp
	function derp(){
		//$this->app->db->connect();
	}

	function formSubmit(){
		echo $_POST['txtName'];
	}
}

?>