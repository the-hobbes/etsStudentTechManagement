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
		case 'fld_streetaddress':
		case 'fld_graddate':
		case 'fld_schedulecode':
		case 'fld_currentrate':
		case 'fld_quizzesdone':
			// validate alphanumeric data
			if (!verifyAlphaNum($newVal)){ 
			    $error = "** Must be Alphanumeric Characters **";
			}
			break;

		case 'fld_zipcode':
			// validate zip codes
			if (!verifyZip($newVal)){ 
			    $error = "** Must be a valid Zip Code **";
			}			
			break;

		case 'fld_email':
			// validate emails
			if (!verifyEmail($newVal)){ 
			    $error = "** Must be a valid Email Address **";
			}
			break;

		case 'fld_phone':
			// validate phone numbers
			if (!verifyPhone($newVal)){ 
			    $error = "** Must be a valid Phone Number **";
			}
			break;

		case 'fld_startdate':
		case 'fld_enddate':
			// make sure these are dates
			if (!verifyIsDate($newVal)){ 
			    $error = "** Must be a valid Date **";
			}
			break;

		case 'fld_hlhours':
		case 'fld_cdchours':
			// make sure these are just numbers
			if (!verifyNum($newVal)){ 
			    $error = "** Must be a valid Number **";
			}
			break;

		case 'fld_confagreement':
			// make sure the value of this is either 'yes' or 'no'
			if (!yesOrNo($newVal)){ 
			    $error = "** Must be a either Yes or No **";
			}
			break;
	}


	return $error;
}

function verifyNum($testString){
	// is the string a number?
	return is_numeric($testString);
}

function verifyZip($testString){
	// is this a zip code? (check both the 5 and 9 digit versions)
	if ( (preg_match ('/^[0-9]{5}$/', $testString)) || (preg_match ('/^([0-9]{5})-([0-9]{4})$/', $testString)) ){
		return true;
	}
	else{
		return false;
	}
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

function yesOrNo($testString){
	// checks to see if the value is either 'yes' or 'no'
	$testMe = strtolower($testString);

	if(($testMe == 'yes') || ($testMe == 'no')){
		return true;
	}
	return false;
}

?>