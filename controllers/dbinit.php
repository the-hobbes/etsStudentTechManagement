<?php

class dbinit extends Controller{
		
	function index(){
		$this->view->render('view_dbinit');
	}

	function createTables(){
		$this->dbinit_model->createTables();
		header('Location: '.siteURL('dbinit'));
	}

	function deleteTables(){
		$this->dbinit_model->deleteTables();
		header('Location: '.siteURL('dbinit'));
	}

	function createData(){
		$this->dbinit_model->createData();
		header('Location: '.siteURL('dbinit'));
	}

	function herp(){
		echo 'derp';
	}
}


?>