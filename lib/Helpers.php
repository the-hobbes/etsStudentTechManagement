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
	//$URI = $_SERVER['REQUEST_URI'];
//	$BASE = siteURL();

//	$crumbs = explode($URI, ROOT_FOLDER);


	//print_r($crumbs);
}


?>