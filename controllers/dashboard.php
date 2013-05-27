<?php
class dashboard extends Controller{

	function index(){
		//print_r($this->quiz_model->getRemainingQuizzes('jman'));
		$data['quizzes'] = $this->quiz_model->getQuizzes();

		$this->view->render('view_dashboard', $data);
	}

	function addquiz(){
		$newquiz=$_POST['txtQuiz'];
		$this->db->execute("INSERT INTO tbl_quizzes VALUES('".$newquiz."')");
	}

}
?>