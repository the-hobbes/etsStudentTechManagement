<?php

class application_model extends Model{

	function getApplicationByNetid($netid){
		$results = $this->db->query("SELECT * FROM tbl_application where fk_netid = '".$netid."'");
		return $results[0];
	}

	function update($netid, $fld, $newval){
		$query = "UPDATE tbl_application SET ".$fld."='".$newval."' WHERE fk_netid = '".$netid."'";
		$this->db->execute($query);
	}
}


?>