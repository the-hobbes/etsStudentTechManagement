<?php
class applications extends Controller{

	function index(){
		$data['tabApplication']="active";
		//$data['applicants'] = $this->people_model
		$data['applications']= $this->application_model->getAllJoined();

		$this->view->render("view_application", $data);
	}

	function submit(){
		echo 'derp';
	}

	function hire(){
		$hashkey = $_POST['hashkey'];

		$person = $this->people_model->getPersonByHashkey($hashkey);
		$netid = $person['pk_netid'];


		$day = date('d');
		$month = date('m');
		$year = date('Y');

		$startdate = $year."-".$month."-".$day;

		//Update the ishired field to 1
		$this->people_model->update($netid, 'fld_ishired', 1);

		//Create empty payroll page
		$query = "INSERT INTO tbl_payroll SET 
			fk_netid='".$netid."',
			fld_startdate='".$startdate."',
			fld_confagreement='no'
			";

		$this->db->execute($query);

	}
}
?>