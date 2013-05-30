<?php

class quiz_model extends Model{

	function getQuizzes(){
		$query="SELECT * FROM tbl_quizzes";
		$results = $this->db->query($query);
		return $results;
	}

	function getQuizzesByNetid($netid){
		$query="SELECT fk_quiz FROM tbl_peoplequiz WHERE fk_netid='".$netid."'";
		$results=$this->db->query($query);
		return $results;
	}

	function addQuizToEmployee($netid,$quiz){
		$query="INSERT INTO tbl_peoplequiz VALUES('".$netid."','".$quiz."')";
		$this->db->execute($query);
	}

	function removeQuizFromEmployee($netid,$quiz){
		$query = "DELETE FROM tbl_peoplequiz WHERE fk_netid='" . $netid . "'AND fk_quiz='". $quiz . "' "; 
		$this->db->execute($query);
	}

	//return the quizzes this person has yet to complete
	function getRemainingQuizzes($netid){
		$allquizzes = $this->getQuizzes();
		$taken 		= $this->getQuizzesByNetid($netid);

		$allquizzes2 = array();
		foreach($allquizzes as $quiz){
			$allquizzes2[$quiz['pk_quiz']] = $quiz['pk_quiz'];
		}

		$taken2 = array();
		foreach($taken as $quiz){
			$taken2[$quiz['fk_quiz']] = $quiz['fk_quiz'];
		}

		$remaining = array_diff($allquizzes2, $taken2);

		return $remaining;
	}
}

?>