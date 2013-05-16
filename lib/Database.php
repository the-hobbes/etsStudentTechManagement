<?php

class Database{
	
	public $app;
	public $con;
	public $pdo;


	function __construct($app){
		$this->app = $app;
	}

	function connect(){

		$this->con = mysql_connect($this->app->conf['hostname'], $this->app->conf['dbUser'], $this->app->conf['dbPass']);	
		mysql_select_db($this->app->conf['database'], $this->con) or die(mysql_error());

		// Check connection
		if (mysqli_connect_errno($this->con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	function query($string){
		$this->connect();

		$result=mysql_query($string);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $string;
		    die($message);
		}

		mysql_close($this->con);

		//Fetch all rows and place in return val
		$returnVal = array();
		$i=0;
		while($row = mysql_fetch_assoc($result)){
			$returnVal[$i]=$row;
			$i++;
		}
		if($i==1){
			$returnVal = $returnVal[0];
		}

		return ($returnVal);	
	}

	//execute(): same as query except does not return results
	function execute($string){
		$this->connect();

		$result=mysql_query($string);

		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $string;
		    die($message);
		}

		mysql_close($this->con);
	}

}


?>