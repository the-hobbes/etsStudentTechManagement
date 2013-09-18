<?php

class people_model extends Model{

	//getPeople(): returns all people in tbl_people
	function getPeople(){
		$results = $this->db->query("SELECT * FROM tbl_people");
		return $results;
	}

	//getEmployees(): gets people who have fld_ishired = 1
	function getEmployees(){
		$results = $this->db->query("SELECT * FROM tbl_people WHERE fld_ishired ='1'");
		return $results;
	}

	//getApplications(): returns people who have fld_ishired = 0
	function getApplicants(){
		$results = $this->db->query("SELECT * FROM tbl_people WHERE fld_ishired ='0'");
		return $results;
	}

	function getPersonByNetid($netid){
		$results = $this->db->query("SELECT * FROM tbl_people WHERE pk_netid = '".$netid."'");
		return $results[0];
	}

	function getPersonByHashkey($hashkey){
		$results = $this->db->query("SELECT * FROM tbl_people WHERE fld_hashkey = '".$hashkey."'");
		return $results[0];
	}

	//update(): updates the specified fld with a new value for the row given by the netid.
	function update($netid, $fld, $newval){
		$newval = mysql_real_escape_string($newval);
		$query = "UPDATE tbl_people SET ".$fld."='".$newval."' WHERE pk_netid = '".$netid."'";
		$this->db->execute($query);
	}

	//hash2fiels(): take in 2 fields, and return the hash value
	function hash2fields($fld1, $fl2){
		//Hash the 2 fields and a sequence of numbers
		$hash = hash("sha256", $fld1.$fl2."3579");

		return $hash;
	}

}


?>