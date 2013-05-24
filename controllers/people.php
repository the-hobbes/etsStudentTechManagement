<?php

class People extends Controller{

	function index(){
		$data['tabEmployees'] = "active";
		//Get the list of employees from tbl_people and send it to the view
		$data['people'] = $this->people_model->getEmployees();
		$this->view->render("view_people", $data);	
	}

	function profile($netid = null){
		$data['tabEmployees'] = "active";

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
		// used to update the database from the in-place editing functions
		$data = explode('.', $_POST['elementid']);
		$hashkey = $data[0];
		$fld = $data[1];
		$table = $data[2];
		$newval = $_POST['newval'];

		// call to sanitize the new information
		$newval = sanitizeInput($newval);

		// call to validate the input, based on what the $fld is
		$error = validateInput($fld, $newval);

		if($error){
			// validation error exists, so echo it as well as the new, incorrect value
			echo $error . "|" . $newval;
		}
		else{
			//If no error, actually modify values
			$person = $this->people_model->getPersonByHashkey($hashkey);
			$netid = $person['pk_netid'];

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
			// print out the new value in the table
			echo $newval;
		}
	}// end update

	function removeQuiz(){
		// return the response
		echo "derp";
	}
} // end people

?>