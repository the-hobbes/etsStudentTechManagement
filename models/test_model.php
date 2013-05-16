<?php

class test_model extends Model{

	function __construct($app){
		parent::__construct($app);
	}

	function doSomething(){
		echo 'something';
	}


}
?>