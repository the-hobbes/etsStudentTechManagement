<!DOCTYPE html>
<html>
	<head>
		<title>ETS Student Technician Managment</title>
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo siteURL("public/css/style.css") ?>" />
		
		<meta name="description" content="Derp" />
		<meta name="author" content="Michael Toth and Phelan Vendeville" />
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="<?php echo siteURL("public/js/jquery.jeditable.mini.js") ?>"></script>
		<script src="<?php echo siteURL("public/js/bootstrap.min.js") ?>"></script>
		<script src="<?php echo siteURL("public/js/editable.js") ?>"></script>
		
	</head>
	<body>
		<div class="container">

			<header class="media_config">
				<h1>ETS Student Technician Managment System</h1>
			</header>
			
			<div class='navbar navbar-inverse'>
				<div class='navbar-inner nav-collapse' style="height: auto;">
					<ul class="nav">
						<li class="active"><a href="<?php echo siteURL()?>">Home</a></li>
						<li><a href="<?php echo siteURL("people")?>">People</a></li>
						<li><a href="<?php echo siteURL("payroll")?>">Payroll</a></li>
					</ul>
				</div> <!-- end navbar-collapse -->
			</div> <!-- end navbar -->

			<?php 
				//Breadcrumbs below	

				//Display the Home link
				echo "<a href =\"".siteURL()."\">Home</a>";

				//get the breakcrumbs, loop through and add link
				$breadcrumbs = getBreadcrumbs(); 
				$size = sizeof($breadcrumbs);

				if($breadcrumbs[0]!=""){
					foreach($breadcrumbs as $crumb){
					
						$crumbs = explode("/", $crumb);
						$lastcrumb = $crumbs[sizeof($crumbs) -1];
						if($lastcrumb != "profile"){ //We don't want to link directly to /profile/
							echo " > <a href =\"".siteURL($crumb)."\">".$lastcrumb."</a>";
						}

					}//foreach
				}//if

				//end breadcrumbs
			?>
		
<!-- begin page specific content -->

