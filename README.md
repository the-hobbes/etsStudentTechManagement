etsStudentTechManagement
========================

Student management system for ETS

By the gentlemens with the name Phelan and Michael

###
#Contents
	-Setup
	-Creating a new page
	-Method usage and form submissions
	-Helper functions
	-TO DO
###
#Setup:
	-mod_rewrite must be enabled
	-pull the files into desired www folder, i,e localhost/ETS
	

###
#Creating a new page
#e.g localhost/ETS/about
	1. Create the controller
		a. create the file 'controllers/about.php'
		b. edit controllers/about.php and paste the following code
			<?php
				class About extends Controller{
					
					function __construct($app){
						parent::__construct($app);
					}

					//index(): Default method. Called when you access controller with no method calls
					function index(){
						$this->view->render('view_main');
					}
				}//end class
			?>
	2. Create the view
		a. create the file 'views/view_main.php'. 
		b. The view file can be named anything, as long as it matches the name of the loaded view in the controller

###
#Method usage and form submissions
	*localhost/ETS/[controller]/[method]

	1. Creating a new method. 
		-In controllers/main.php create the function "derp"
			function derp(){
				echo 'derp';
			}
		-to test functionality, browse to 'localhost/ETS/main/derp' and you should see the text 'derp'


	2. Form submissions
		-In controllers/main.php create the function "formSubmit", for example (can be named anything)
			function formSubmit(){
				echo $_POST['txtName'];
			}
		-In your view file, create a form with the action set to this new function:
			<form action="<?php echo siteURL("main/formSubmit") ?>" method="POST">
			<input type="text" name="txtName" />
			<input type="submit" value="submit" />
			</form>

		-Test by filling the text box and hitting submit. You should be redirected to a page with the text that you entered printed




###
#Helper Function
#located in libs/Helpers.php

	siteURL([optional $string]):
		no parameters: return the base url of the site. e.g http://localhost/ETS/

		with parameters: return the base url with the string concatenated
			$string = "public/css/mainstyle.css"
			returns "http://localhost/ETS/public/css/mainstyle.css"

###
#TODO
	1. Setup models
	2. set up database wrapper