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

	//add each breadcrumb to an array. e.g [0] => people, [1] => people/profile, [2] =>people/profile/mftoth
	$i=0;
	$size= sizeof($crumbs);
	while($i < $size -1){
		if($i!=0){
			$breadcrumbs[$i] = $breadcrumbs[$i-1].'/'.$crumbs[$i+1];
		}else{
			$breadcrumbs[$i] = $crumbs[$i+1];
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


?>