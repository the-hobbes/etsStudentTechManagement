<?php

class People extends Controller{

	function index(){
		$data['tabPeople'] = "active";
		//Get the list of people from tbl_people and send it to the view
		$data['people'] = $this->people_model->getPeople();
		$this->view->render("view_people", $data);	
	}

	function profile($netid = null){
		$data['tabPeople'] = "active";
		
		if($netid){
			$data['person'] = $this->people_model->getPersonByNetid($netid);
			$data['application'] = $this->application_model->getApplicationByNetid($netid);
			$data['payroll'] = $this->payroll_model->getPayrollByNetId($netid);
			$this->view->render("view_profile", $data);
		}
		else{
			// handle direct requests for /profile gracefully
			$this->view->render("view_main", $data = null);
		}
		
	}


	function update(){
		$data = explode('.', $_POST['elementid']);
		$netid = $data[0];
		$fld = $data[1];
		$table = $data[2];
		$newval = $_POST['newval'];

		switch($table){
			case 'tbl_people':
				$this->people_model->update($netid, $fld, $newval);
				break;
			case 'tbl_application':
				$this->application_model->update($netid, $fld, $newval);
				break;
			case 'tbl_payroll':
				$this->payroll_model->update($netid, $fld, $newval);
				$this->payroll_model->recalculateFields($netid);
				break;
		}
		

		echo $newval;
		//echo 'update '.$fld.' to value '.$newval.' for user '.$netid;
	}
}

?>