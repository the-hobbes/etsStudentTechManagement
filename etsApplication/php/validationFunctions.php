<?php

//FUNCTIONS
//print "validation functions included OK";     // uncomment  to check the page is included in the form

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

//Date m/d/y and mm/dd/yyyy
//1/1/99 through 12/31/99 and 01/01/1900 through 12/31/2099
//Matches invalid dates such as February 31st
//Accepts dashes, spaces, forward slashes and dots as date separators
function verifyDateFormat ($testString) {
//    return (preg_match('/^(\d\d?)-(\d\d?)-(\d\d\d\d)$/', $testString));
return true;
}

/*
The month is between 1 and 12 inclusive.
The day is within the allowed number of days for the given month . Leap year s are taken into consideration.
The year is between 1 and 32767 inclusive.
*/
function verifyIsDate ($testDate) {
    $month = date( 'm', $testDate );
    $day   = date( 'd', $testDate );
    $year  = date( 'Y', $testDate );
 
    if (checkdate($month, $day, $year)){
       return TRUE;
  }
  return FALSE; 
}

?>