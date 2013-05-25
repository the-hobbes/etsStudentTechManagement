<?php
class dashboard extends Controller{

	function index(){
		//print_r($this->quiz_model->getRemainingQuizzes('jman'));
		$data['quizzes'] = $this->quiz_model->getQuizzes();

		$this->view->render('view_dashboard', $data);
	}

}
?>