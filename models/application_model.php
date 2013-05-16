<?php

class application_model extends Model{

	function getApplicationByNetid($netid){
		$results = $this->db->query("SELECT * FROM tbl_application where fk_netid = '".$netid."'");
		return $results;
	}

}


?>