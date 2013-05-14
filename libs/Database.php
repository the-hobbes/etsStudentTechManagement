<?php

class Database{
	
	public $app;
	public $con;
	public $pdo;


	function __construct($app){
		$this->app = $app;


	//	$this->pdo = new PDO('mysqli:host='.$this->app->conf['hostname'].';dbname='.$this->app->conf['database'], 
	//						$this->app->conf['dbUser'], $this->app->conf['dbPass']);



	}

	function connect(){

		$this->con = mysqli_connect($this->app->conf['hostname'], $this->app->conf['dbUser'], $this->app->conf['dbPass'],$this->app->conf['database']);
	//	print_r($this->con);		
		//mysql_select_db($this->app->conf['database']) or die('could not select db');

		// Check connection
		if (mysqli_connect_errno($this->con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	function query($string){
		//$this->connect();

		$result = $this->pdo->query($string);

		/*if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $string;
		    die($message);
		}

		mysqli_close($this->con);
*/
		return $result;	
	}


	function __destruct(){
		//mysqli_close($this->con);
	}
}


?>