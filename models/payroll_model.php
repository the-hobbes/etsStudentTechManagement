<?php

class payroll_model extends Model{

	//getAll(): get all rows
	function getAll(){
		$query = "SELECT * FROM tbl_payroll";
		$results = $this->db->query($query);

		return $results;
	}

	function getPayrollByNetid($netid){
		$query = "SELECT * FROM tbl_payroll WHERE fk_netid = '".$netid."'";
		$results = $this->db->query($query);

		if ($results)
			return $results[0];
	}

	function update($netid, $fld, $newval){
		$query = "UPDATE tbl_payroll SET ".$fld."='".$newval."' WHERE fk_netid = '".$netid."'";
		$this->db->execute($query);
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