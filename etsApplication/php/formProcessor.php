<?php

// include validation functions

include ("validationFunctions.php");
include("DB.php");
require '../../lib/config.php';
// pull a json array from what was posted
$clientInfo = json_decode($_POST['data'], true);
//print_r($clientInfo);

// pull out all of the data from the json array
$lastName = $clientInfo[0]['value'];
$firstName = $clientInfo[1]['value'];
$middleInitial = $clientInfo[2]['value'];
$streetAddress=$clientInfo[3]['value'];
$zipCode = $clientInfo[4]['value'];
$email=$clientInfo[5]['value'];
$netID = $clientInfo[6]['value'];
$major = $clientInfo[7]['value'];
$usEligible = parseRadioButton($clientInfo[8], $clientInfo[9]); // which button was selected?

$previouslyWorked = parseRadioButton($clientInfo[10], $clientInfo[11]);
$undergradStudent = parseRadioButton($clientInfo[12], $clientInfo[13]);
$gradStudent = parseRadioButton($clientInfo[14], $clientInfo[15]);
$creditNumber = $clientInfo[16]['value'];
$graduationDate = $clientInfo[17]['value'];
$workStudyAmount = $clientInfo[18]['value'];

$employerName = $clientInfo[19]['value'];
$employerAddress = $clientInfo[20]['value'];
$employerPhone = $clientInfo[21]['value'];
$payRate = $clientInfo[22]['value'];
$hoursWorked = $clientInfo[23]['value'];
$jobDuties = $clientInfo[24]['value'];
$mayWeContact = parseRadioButton($clientInfo[25], $clientInfo[26]);

$referenceName = $clientInfo[27]['value'];
$referencePhone = $clientInfo[28]['value'];
$referenceRelation = $clientInfo[29]['value'];

$goodCandidate = $clientInfo[30]['value'];
$prevCustExperience = $clientInfo[31]['value'];
$prevComputerTroubleshooting = $clientInfo[32]['value'];

// sanitize the user's input
$lastName = htmlentities($lastName, ENT_QUOTES);
$firstName = htmlentities($firstName, ENT_QUOTES);
$middleInitial = htmlentities($middleInitial, ENT_QUOTES);
$streetAddress = htmlentities($streetAddress, ENT_QUOTES);
$zipCode = htmlentities($zipCode, ENT_QUOTES);
$email = htmlentities($email, ENT_QUOTES);
$netID = htmlentities($netID, ENT_QUOTES);
$major = htmlentities($major, ENT_QUOTES);
$usEligible = htmlentities($usEligible, ENT_QUOTES);
$usEligible2 = htmlentities($usEligible2, ENT_QUOTES);

$previouslyWorked = htmlentities($previouslyWorked, ENT_QUOTES);
$previouslyWorked2 = htmlentities($previouslyWorked2, ENT_QUOTES);
$undergradStudent = htmlentities($undergradStudent, ENT_QUOTES);
$undergradStudent2 = htmlentities($undergradStudent2, ENT_QUOTES);
$gradStudent = htmlentities($gradStudent, ENT_QUOTES);
$gradStudent2 = htmlentities($gradStudent2, ENT_QUOTES);
$creditNumber = htmlentities($creditNumber, ENT_QUOTES);
$graduationDate = htmlentities($graduationDate, ENT_QUOTES);
$workStudyAmount = htmlentities($workStudyAmount, ENT_QUOTES);

$employerName = htmlentities($employerName, ENT_QUOTES);
$employerAddress = htmlentities($employerAddress, ENT_QUOTES);
$employerPhone = htmlentities($employerPhone, ENT_QUOTES);
$payRate = htmlentities($payRate, ENT_QUOTES);
$hoursWorked = htmlentities($hoursWorked, ENT_QUOTES);
$jobDuties = htmlentities($jobDuties, ENT_QUOTES);
$mayWeContact = htmlentities($mayWeContact, ENT_QUOTES);
$mayWeContact2 = htmlentities($mayWeContact2, ENT_QUOTES);

$referenceName = htmlentities($referenceName, ENT_QUOTES);
$referencePhone = htmlentities($referencePhone, ENT_QUOTES);
$referenceRelation = htmlentities($referenceRelation, ENT_QUOTES);

$goodCandidate = htmlentities($goodCandidate, ENT_QUOTES);
$prevCustExperience = htmlentities($prevCustExperience, ENT_QUOTES);
$prevComputerTroubleshooting = htmlentities($prevComputerTroubleshooting, ENT_QUOTES);


// perform validation
$errorMsg=array();

// are required fields all filled out?
validateStringField($lastName);
validateStringField($firstName);
validateStringField($middleInitial);
validateStringField($streetAddress);
validateStringField($zipCode);
validateStringField($email);
validateStringField($netID);
validateStringField($major);
validateStringField($graduationDate);

// are required fields filled with the right kind of data?
validateNumericField($zipCode);
validateEmail($email);

// print_r($errorMsg);

if($errorMsg){
	// do something, sending the errors back to the view so they can be displayed.
	return null;
}
else{
	sendToDatabase();
}
/**
 * validateRequiredField
 * Used to validate required fields (make sure they have something in them).
**/
function validateStringField($fieldValue){
	if($fieldValue == "") {
		$errorMsg[] = '**This Field Is Required**';
	}
}

/**
 * validateNumericField
 * Used to make sure that a field which is only numeric data only contains numeric data.
 * Used on something like a zipcode or phone number.
**/ 
function validateNumericField($fieldValue){
	$valid = verifyPhone ($fieldValue);
	if (!$valid){ 
	    $errorMsg[]="**Need a Valid ZipCode**";
	}
}

/**
 * validateEmail
 * Used to make sure that an email field contains a legit email.
**/ 
function validateEmail($fieldValue){
	$valid = verifyEmail($fieldValue);
	if (!$valid){ 
	    $errorMsg[]="**Need a Valid Email**";
	}
}

/**
 * parseRadioButton
 * Used to check to see which of the two radio buttons was actually selected by the user, as indicated by the 'checked' value.
**/ 
function parseRadioButton($button1, $button2){
	if($button1['checked']){
		return $button1['value'];
	}
	else{
		return $button2['value'];
	}
}

/**
 * sendEmail
 * Used to send the data the user has filled out to the managers. 
**/ 
function sendEmail(){
	global $firstName, $middleInitial, $lastName, $streetAddress, $zipCode, $email, $netID, $major, $usEligible, $previouslyWorked, $undergradStudent, $gradStudent, $creditNumber, $graduationDate, $workStudyAmount, $employerName, $employerAddress, $employerPhone, $payRate, $hoursWorked, $jobDuties, $mayWeContact, $referenceName, $referenceRelation, $referencePhone, $goodCandidate, $prevCustExperience, $prevComputerTroubleshooting;
	//get date and time
    $Todays_Date = strftime("%x");
    $Current_Time = strftime("%X");

	//$to .= "ccaldwel@uvm.edu" . ", " . "tsbartle@gmail.com" . ", " . "phelan.vendeville@gmail.com";
	$subject = "Application for employment, submitted on " . $Todays_Date . " at " . $Current_Time;

	// craft the message
	$message = "<html><head><title>Confirmation</title></head><body>";
	$message .= "<p>Applicant Name: " . $firstName . " " . $middleInitial . " " . $lastName . "</p>";
	$message .= "<p>Applicant Physical Address: " . $streetAddress . ", " . $zipCode . "</p>";
	$message .= "<p>Applicant Email Address: " . $email . "</p>";
	$message .= "<p>UVM NetID: " . $netID . ", UVM Major: " . $major . "</p>";
	$message .= "<p>Eligible to work in the United States? " . $usEligible . "</p>"; 
	$message .= "<p>Previously worked at UVM? " . $previouslyWorked . "</p>";
	$message .= "<p>Currently an Undergraduate Student? " . $undergradStudent . "</p>";
	$message .= "<p>Currently a Graduate Student " . $gradStudent . "</p>";
	$message .= "<p>Number of Credits Enrolled: " . $creditNumber . "</p>";
	$message .= "<p>Expected data of Graduation: " . $graduationDate . "</p>";
	$message .= "<p>Work study amount: " . $workStudyAmount . "</p>";
	$message .= "<p>Previous employment: </p>";
	$message .= "<p>Employer Name: " . $employerName . "</p>";
	$message .= "<p>Employer Address: " . $employerAddress . "</p>";
	$message .= "<p>Employer Phone Number: " . $employerPhone . "</p>";
	$message .= "<p>Pay Rate: " . $payRate . "</p>";
	$message .= "<p>Hours worked per week: " . $hoursWorked . "</p>";
	$message .= "<p>Job Duties: " . $jobDuties . "</p>";
	$message .= "<p>May we contact employer? " . $mayWeContact . "</p>";
	$message .= "<p>References: </p>";
	$message .= "<p>Reference Name: " . $referenceName . "</p>";
	$message .= "<p>Reference Phone number: " .$referencePhone . "</p>";
	$message .= "<p>Reference Relationship: " . $referenceRelation . "</p>";
	$message .= "<p>Candidate Information: </p>";
	$message .= "<p>What makes you a good candidate: " . $goodCandidate . "</p>";
	$message .= "<p>Previous Customer Experience: " . $prevCustExperience . "</p>";
	$message .= "<p>Previous computer troubleshooting experience: " . $prevComputerTroubleshooting . "</p>";
	$message .= "</body></html>";

	// Content-type headers
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "(From the automated ETS Application Form Mailer)\r\n";

    // and now to mail it
   // $mailer = mail($to, $subject, $message, $headers);
}

function sendToDatabase(){
		//include 'DB.php';
		//include the config where the db settings exits
		

		global $config;
		$db = new Database($config['hostname'],$config['dbUser'],$config['dbPass'],$config['database']);

		global $firstName, $middleInitial, $lastName, $streetAddress,$zipCode, $email, $netID, $major, $usEligible, $previouslyWorked, $undergradStudent, $gradStudent, $creditNumber, $graduationDate, $workStudyAmount, $employerName, $employerAddress, $employerPhone, $payRate, $hoursWorked, $jobDuties, $mayWeContact, $referenceName, $referenceRelation, $referencePhone, $goodCandidate, $prevCustExperience, $prevComputerTroubleshooting;

		$hashkey = hash2fields($netID,$email);

		$day = date('d');
		$month = date('m');
		$year = date('Y');

		$date = $year."-".$month."-".$day;

		$db->execute("INSERT INTO tbl_people VALUES('".$netID."', '".$firstName."', '".$lastName."', '".$middleInitial."', '".$streetAddress."', '".$zipcode."',
					'".$email."', '".$major."', '".$graduationDate."', '000-000-0000', 'XXX', '".$hashkey."', '0')");

		$db->execute("INSERT INTO tbl_application VALUES(null,'".$netID."', '".$date."', '".$previouslyWorked."', '".$usEligible."', '".$undergradStudent."','".$gradStudent."' ,'".$creditNumber."',
					'".$workStudyAmount."', '".$employerName."', '".$employerAddress."', '".$employerPhone."', '".$payRate."', '".$hoursWorked."',
					'".$jobDuties."', '".$mayWeContact."', '".$referenceName."', '".$referencePhone."', '".$referenceRelation."', '".$goodCandidate."',
					'".$prevCustExperience."', '".$prevComputerTroubleshooting."')");

		//$db->execute("INSERT INTO tbl_application")

}


//hash2fiels(): take in 2 fields, and return the hash value
function hash2fields($fld1, $fl2){
	//Hash the 2 fields and a sequence of numbers
	$hash = hash("sha256", $fld1.$fl2."3579");

	return $hash;
}
?>