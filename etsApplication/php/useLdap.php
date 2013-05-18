<?php 

//************************************************************
// look for the uvm net id, and display the first and last name of that person.
$netID = "";
$firstName = "";
$lastName = "";

function useLDAP($uvmID)
{
	global $netID,  $firstName, $lastName; 

    //you need to connect to the ldap server
    $ds=ldap_connect("ldap.uvm.edu");
	$info;
	
	//if your connection worked lets get the info we need
	if ($ds) 
	{
		//set up our parameters (no need to change them)
		$r=ldap_bind($ds);
		$dn = "uid=$uvmID,ou=People,dc=uvm,dc=edu";
		$filter="(|(netid=$uvmID))";
		
		//add all ldap items you are looking for to the array
		$findthese = array("givenname","sn");
		
		// now do the search and get the results, which are storing in $info
		$sr=ldap_search($ds, $dn, $filter, $findthese);
		
		if (ldap_count_entries($ds, $sr) > 0) 
		{
			$info = ldap_get_entries($ds, $sr);
			// print_r($info);
			// print "<b>" . $info[0]["givenname"][0] ." ". $info[0]["sn"][0] . "</b>";
			$firstName = $info[0]["givenname"][0];
			$lastName = $info[0]["sn"][0];
			$netID = $uvmID;
		}
	}
}