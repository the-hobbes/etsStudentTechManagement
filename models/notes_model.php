<?php 

class Notes_model extends Model {

	function getNotes($netid){
		$query = "SELECT * FROM tbl_peoplenotes where fk_netid='".$netid."' order by fld_datecreated desc";

		$results = $this->db->query($query);

		return $results;
	}	

	function addNote($netid, $title, $content){

		$title = mysql_real_escape_string($title);
		$content = mysql_real_escape_string($content);

		$date=date("Y-m-d H:i:s"); 
		$query = "INSERT INTO tbl_peoplenotes VALUES('".$netid."', '', '".$title."', '".$content."', '".$date."')";

		$this->db->execute($query);

	}

}

?>