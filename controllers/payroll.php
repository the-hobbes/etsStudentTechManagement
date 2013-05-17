<?php


class Payroll extends Controller{

	//index()
	function index(){

		$data['payroll'] = $this->payroll_model->getAll();
		$data['total_hrsperweek']=$this->payroll_model->colTotal("fld_hrsperweek");
		$data['total_costperweek']=$this->payroll_model->colTotal("fld_costperweek");
		$data['total_hlhours']=$this->payroll_model->colTotal("fld_hlhours");
		$data['total_cdchours']=$this->payroll_model->colTotal("fld_cdchours");

		$this->view->render("view_payroll", $data);
	}//end: index()

	function getUpdatedPayroll(){
		$netid = $_POST['netid'];
		$payroll = $this->payroll_model->getPayrollByNetid($netid);

		$payroll = json_encode($payroll);
		echo $payroll;
	}
}

	

?>