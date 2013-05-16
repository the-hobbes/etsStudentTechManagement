<?php

class People extends Controller{

	function index(){

		//Get the list of people from tbl_people and send it to the view
		$data['people'] = $this->people_model->getPeople();
		$this->view->render("view_people", $data);	
	}

	function profile($netid){
		$data['person'] = $this->people_model->getPersonByNetid($netid);
		$data['application'] = $this->application_model->getApplicationByNetid($netid);
		$this->view->render("view_profile", $data);
	}
}

?>