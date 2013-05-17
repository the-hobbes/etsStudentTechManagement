<?php

class application_model extends Model{

	function getApplicationByNetid($netid){
		$results = $this->db->query("SELECT * FROM tbl_application where fk_netid = '".$netid."'");
		return $results[0];
	}

	function getAll(){
		$results = $this->db->query("SELECT * FORM tbl_application");
		return $results;
	}

	function getAllJoined(){
		$results = $this->db->query("SELECT * FROM tbl_people JOIN tbl_application ON tbl_people.pk_netid=tbl_application.fk_netid ORDER BY fld_submissiondate DESC");
		return $results;
	}

	function update($netid, $fld, $newval){
		$query = "UPDATE tbl_application SET ".$fld."='".$newval."' WHERE fk_netid = '".$netid."'";
		$this->db->execute($query);
	}
}


?>