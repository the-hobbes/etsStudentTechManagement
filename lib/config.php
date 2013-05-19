<?php

/*Default Controller
The controller to be called by default if there are no URL parameters
*/
$config['default_controller'] = 'main';
 

//Debugging. If enabled, the site will show php errors
$config['debug']=true;

//Database
$config['dbEnabled'] = true;
$config['hostname'] = "localhost";
$config['dbUser'] = "root";
$config['dbPass'] = "";
$config['database'] = "ets";

//>>>Models<<<
//Models used for handling business logic and communicating with database.
//Create a model by adding the file to the models/ folder
//Add the models you want used in this application by adding the file name to this array
$config['models'] = array(
	'people_model',
	'application_model',
	'payroll_model'

	);
?>