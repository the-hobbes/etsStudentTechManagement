<?php
class applications extends Controller{

	function index(){
		$data['tabApplication']="active";
		$data['applications']= $this->application_model->getAllJoined();

		$this->view->render("view_application", $data);
	}

	function submit(){
		echo 'derp';
	}

}
?>