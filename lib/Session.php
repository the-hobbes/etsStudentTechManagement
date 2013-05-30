<?php
class Session extends AppLoader{

	function __construct(){

	}

	//getUser(): return the currently logged in user
	function getUser(){
		return $_SESSION['user'];
	}//end: getUser();

	//setUser(): set the current user
	function setUser($user){
		$_SESSION['user']= $user;
	}

	//getData(): return data with the inputted key
	function getData($key){
		return $_SESSION[$key];
	}//end: getData()

	//setData($key, $val): load the key with the given data
	function setData($key, $val){
		$_SESSION[$key] = $val;
	}//end: setData()

	//loadData($data): load an array of data into the session
	function loadData($data){
		foreach($data as $key => $value){
			$_SESSION[$key] = $value;
		}//foreach
	}//end: loadData()

	//isAuthorized(): return true if the user is on the authorized list, false if not.
	function isAuthorized(){	

		//Create authorized user table if it doesn't already exist
		$this->db->execute($this->dbinit_model->tables['authorizedusers']);

		$query="SELECT * FROM tbl_authorizedusers WHERE pk_netid='".$this->getUser()."'"; 
		$results = $this->db->query($query);
		
		if(sizeof($results)==0){//no return results for current user, disallow
			return false;
		}else{
			return true;
		}
	}
}
?>