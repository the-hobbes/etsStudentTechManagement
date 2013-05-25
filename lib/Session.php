<?php
class Session extends AppLoader{

	function __construct(){

	}

	//getUser(): return the currently logged in user
	function getUser(){
		return $_SESSION['user'];
	}//end: getUser();

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
}
?>