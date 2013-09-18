<?php

class payroll_model extends Model{

	//getAll(): get all rows
	function getAll(){
		// $query = "SELECT * FROM tbl_payroll";
		// retrieve only the payroll data for those who have been hired. 
		$query = 
			"SELECT * FROM tbl_payroll pr
			JOIN tbl_people p on pr.fk_netid = p.pk_netid
			WHERE p.fld_ishired = 1";

		$results = $this->db->query($query);

		return $results;
	}

	function getPayrollByNetid($netid){
		$query = "SELECT * FROM tbl_payroll WHERE fk_netid = '".$netid."'";
		$results = $this->db->query($query);

		if ($results)
			return $results[0];
	}

	function recalculateFields($netid){
		$payroll = $this->getPayrollByNetid($netid);

		//Total hours
		$hrsperweek = $payroll['fld_hlhours'] + $payroll['fld_cdchours'];

		//Total cost (hrs*rate)
		$costperweek = $hrsperweek*$payroll['fld_currentrate'];

		$hlcost = $payroll['fld_currentrate']*$payroll['fld_hlhours'];
		$cdccost = $payroll['fld_currentrate']*$payroll['fld_cdchours'];

		$this->update($netid, "fld_hrsperweek", $hrsperweek);
		$this->update($netid, "fld_costperweek", $costperweek);
		$this->update($netid, "fld_hlcost", $hlcost);
		$this->update($netid, "fld_cdccost", $cdccost);
	}

	function update($netid, $fld, $newval){
		$newval = mysql_real_escape_string($newval);
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