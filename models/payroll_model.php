<?php

class payroll_model extends Model{

	//getAll(): get all rows
	function getAll(){
		$query = "SELECT * FROM tbl_payroll";
		$results = $this->db->query($query);

		return $results;
	}

	//colTotal(): return the total of the specified field
	function colTotal($column){
		$query = "SELECT ".$column." FROM tbl_payroll";
		$results = $this->db->query($query);

		$sum = 0;
		foreach($results as $colentry){
			$sum = $sum + $colentry[$column];
		}

		return $sum;
	}

}

?>