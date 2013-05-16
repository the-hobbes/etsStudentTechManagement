<?php

/*Default Controller
The controller to be called by default if there are no URL parameters
*/
$config['default_controller'] = 'people';
 

//Database
$config['dbEnabled'] = true;
$config['hostname'] = "localhost";
$config['dbUser'] = "root";
$config['dbPass'] = "root";
$config['database'] = "ETS";

//>>>Models<<<
//Models used for handling business logic and communicating with database.
//Create a model by adding the file to the models/ folder
//Add the models you want used in this application by adding the file name to this array
$config['models'] = array(
	'test_model'

	);
?>