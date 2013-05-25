<?php


class Payroll extends Controller{

	//index()
	function index(){
		//only do this if user is logged in.
		if($this->session->isAuthorized()){

			$data['tabPayroll'] = "active";

			$data['payroll'] = $this->payroll_model->getAll();
			$data['total_hrsperweek']=$this->payroll_model->colTotal("fld_hrsperweek");
			$data['total_costperweek']=$this->payroll_model->colTotal("fld_costperweek");
			$data['total_hlhours']=$this->payroll_model->colTotal("fld_hlhours");
			$data['total_cdchours']=$this->payroll_model->colTotal("fld_cdchours");

			$this->view->render("view_payroll", $data);

		}else{
			$this->view->render("notauthorized");
		}
	}//end: index()

	function getUpdatedPayroll(){
		$hashkey = $_POST['hashkey'];

		$person = $this->people_model->getPersonByHashkey($hashkey);
		$netid = $person['pk_netid'];
		
		$payroll = $this->payroll_model->getPayrollByNetid($netid);

		$payroll = json_encode($payroll);
		echo $payroll;
	}
}

	

?>