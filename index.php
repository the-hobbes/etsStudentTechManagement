<?php

//Require config.php. This file conains configuration settings for the site
require 'lib/config.php';

//This is for displaying php errors. If debugging is enabled, errors will appear
if($config['debug']){
	error_reporting(32767);
	ini_set('display_errors', '1');
}

/*
	Define site contstants
*/
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = explode(basename(__DIR__), $url);
$url = $url[0].basename(__DIR__).'/';

define("ROOT_FOLDER",basename(__DIR__)); //"define the name of the root application folder. eg. if the baseurl is http://localhost/ETS/, the ROOT_FOLDER is 'ETS'
define("BASE_URL", $url); //define base url as http path to this folder, it. "http://localhost/ets/etsStudentTechManagement/"
define("ABS_PATH", getcwd().'/'); //Define absolute unix  path to this folder. I.E /home/mike/www/ETS/

//end: site constants

//Require the web_application. This is the class in which the whole site functions
require 'lib/web_application.php';

//Instantiate the site and load is the $config variable in order to pass it site settings
$app = new web_application($config);




?>
