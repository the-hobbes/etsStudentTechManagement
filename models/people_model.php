<?php

class people_model extends Model{

	//getPeople(): returns all people in tbl_people
	function getPeople(){
		$results = $this->db->query("SELECT * FROM tbl_people");
		return $results;
	}

	function getPersonByNetid($netid){
		$results = $this->db->query("SELECT * FROM tbl_people where pk_netid = '".$netid."'");
		return $results;
	}

}


?>