<?php
/*
	Helpers.php

	Useful functions that can be used anywhere
*/

//Return base site url with optional string attached
function siteURL($string = ""){
	$url = "http://".BASE_URL.$string; 
	return $url;
}

function getBreadcrumbs(){
	$URI = $_SERVER['REQUEST_URI'];

	//Get the url after the rootfolder path
	$crumbs = explode(ROOT_FOLDER, $URI);
	$crumbs = explode('/', $crumbs[1]);

	$breadcrumbs = array();
	//$lastcrumb = $crumbs[sizeof($crumbs) -1];
	//add each breadcrumb to an array. e.g [0] => people, [1] => people/profile, [2] =>people/profile/mftoth
	$i=0;
	$size= sizeof($crumbs);
	while($i < $size -1){
		//$crumbs2 = explode("/", $crumb);
		if($i!=0){
			$breadcrumbs[$i] = $breadcrumbs[$i-1].'/'.$crumbs[$i+1];
			//$breadcrumbs[$i][1] = $lastcrumb;
		}else{
			$breadcrumbs[$i] = $crumbs[$i+1];
			//$breadcrumbs[$i][1] = $lastcrumb;
		}
		$i++;
	}
	return $breadcrumbs;
}

function getCurrentPage(){
	$URI = $_SERVER['REQUEST_URI'];
	$pieces = explode('/', $URI);
	$last = $pieces[sizeof($pieces)-1];

	return $last;
}

// validation and santization section

function sanitizeInput($dirty){
	// used to render input safe so it can be added to the database
	$clean = htmlentities($dirty, ENT_QUOTES);
	return $clean;
}

function validateInput($fld, $newVal){
	// used to validate $newVal based on what input type $fld is
	$error = null;

	switch($fld){
		case 'fld_':
		//do something, calling one of the validation functions;
		break;
	}


	return $error;
}

function verifyAlphaNum ($testString) {
    // Check for letters, numbers and dash, period, space and single quote only. 
    return (preg_match ("/^([[:alnum:]]|-|\.| |')+$/", $testString));
}    

function verifyEmail ($testString) {
    // Check for a valid email address 
    return (preg_match("/^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$/", $testString));
}

function verifyText ($testString) {
    // Check for letters, numbers and dash, period, ?, !, space and single and double quotes only. 
    return (preg_match("/^([[:alnum:]]|-|\.| |\n|\r|\?|\!|\"|\')+$/",$testString));
}

function verifyPhone ($testString) {
    // Check for only numbers, dashes and spaces in the phone number 
    return (preg_match('/^([[:digit:]]| |-)+$/', $testString));
}

function verifyDateFormat ($testString) {
	// Date m/d/y and mm/dd/yyyy
	// 1/1/99 through 12/31/99 and 01/01/1900 through 12/31/2099
	// Matches invalid dates such as February 31st
	// Accepts dashes, spaces, forward slashes and dots as date separators
	// return (preg_match('/^(\d\d?)-(\d\d?)-(\d\d\d\d)$/', $testString));
	return true;
}

function verifyIsDate ($testDate) {
	// The month is between 1 and 12 inclusive.
	// The day is within the allowed number of days for the given month . Leap year s are taken into consideration.
	// The year is between 1 and 32767 inclusive.
    $month = date( 'm', $testDate );
    $day   = date( 'd', $testDate );
    $year  = date( 'Y', $testDate );
 
    if (checkdate($month, $day, $year)){
       return true;
  	}
	return false; 
}

?>