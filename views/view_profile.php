<?php
	$person = $data['person'];
	$application = $data['application'];
	$payroll = $data['payroll'];

	echo "<h4>".$data['person']['fld_firstname']." ".$data['person']['fld_lastname']." - ".$person['pk_netid']."</h4>";

?>	
	<script type="text/javascript">
		$(document).ready(function() {
		  	
			tab = document.URL.split("#");
			tab = tab[1];

			// Handle tab clicks
			$('.tab').click(function () {
				// Remove the 'active' class from the active tab.
				$('#tabs_container > .nav-tabs > li.active').removeClass('active');

				// Add the 'active' class to the clicked tab.
				$(this).addClass('active');

				// Remove the 'tab_contents_active' class from the visible tab contents.
				$('.tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');

				// Add the 'tab_contents_active' class to the associated tab contents.
				var whichTab = $(this).attr('rel');
				$('.tab_contents_container > ' + whichTab).addClass('tab_contents_active');


				// this prevents the click from being followed and thus jumping to the top of the page because of '#'
				return false;
			});

			//updates the tab when it gets switch programatically
			$('.tab').on('show', function(e){
				$('#tabs_container > .nav-tabs > li.active').removeClass('active');

				// Add the 'active' class to the clicked tab.
				$(this).addClass('active');

				// Remove the 'tab_contents_active' class from the visible tab contents.
				$('.tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');

				// Add the 'tab_contents_active' class to the associated tab contents.
				var whichTab = $(this).attr('rel');
				$('.tab_contents_container > ' + whichTab).addClass('tab_contents_active');


				// this prevents the click from being followed and thus jumping to the top of the page because of '#'
				return false;

			});

			//switch tab based on url;
			if(tab == "payroll"){
				$('#tabs_container li:eq(1) a').tab('show');
			}
			if(tab == "application"){
				$('#tabs_container li:eq(2) a').tab('show');	
			}
			if(tab == "general"){
				$('#tabs_container li:eq(0) a').tab('show');	
			}
		});

	    function removeVal(){
	        // function to remove quizzes from the database

	        siteURL = $("#siteURL").attr('value');
	        var yourSelect = document.getElementById('quizForm');
	        removeThis = yourSelect.options[yourSelect.selectedIndex].value;
	        
	        // make ajax post to server
	        var request = $.ajax({
		        url: siteURL + "people/removeQuiz",
		        type: 'POST',
				data: removeThis,
				dataType: 'text'
		    });
	        // success callback
		    request.done(function (response, textStatus, jqXHR){
		        // update the form
		        console.log(response);
		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // log the error to the console
		        console.error(
		            "The following error occured: "+
		            textStatus, errorThrown
		        );
		    });
	    }	

	</script>
	<input id = "siteURL" type="hidden" value="<?php echo siteURL() ?>" />
	
	<div id="tabs_container" class="span11">
		<ul class="nav nav-tabs">
			<li class="active tab" rel="#tab_1_contents"><a href="#general"><h3>General</h3></a></li> 

			<?php if($person['fld_ishired']==1){ //only show payroll tab if person is hired ?>
			<li class="tab" rel="#tab_2_contents"><a href="#payroll"><h3>Payroll</h3></a></li>
			<?php } ?>

			<li class="tab" rel="#tab_3_contents"><a href="#application"><h3>Application</h3></a></li> 
			<div class="clear"></div>
		</ul> <!-- nav tabs -->

	<!-- This is a div that hold all the tabbed contents -->
	<div class="tab_contents_container">

        <!-- Tab 1 Contents -->
		<div id="tab_1_contents" class="tab_contents tab_contents_active">

			<!-- general tab -->
			<table class="table table-striped">
				<tr>
					<th>Item</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>First Name</td>
					<td><?php echo $person['fld_firstname'] ?></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><?php echo $person['fld_lastname'] ?></td>
				</tr>
				<tr>
					<td>Middle Initial</td>
					<td><?php echo $person['fld_middleinitial'] ?></td>
				</tr>
				<tr>
					<td>Street Address</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_streetaddress.tbl_people" ?>" class="edit"><?php echo $person['fld_streetaddress'] ?></td>
				</tr>
				<tr>
					<td>Zip Code</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_zipcode.tbl_people" ?>" class="edit"><?php echo $person['fld_zipcode'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_email.tbl_people" ?>" class="edit"><?php echo $person['fld_email'] ?></td>
				</tr>
				<tr>
					<td>Graduation Date</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_graddate.tbl_people" ?>" class="edit"><?php echo $person['fld_graddate'] ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_phone.tbl_people" ?>" class="edit"><?php echo $person['fld_phone'] ?></td>
				</tr>
				<tr>
					<td>Schedule Code</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_schedulecode.tbl_people" ?>" class="edit"><?php echo $person['fld_schedulecode'] ?></td>
				</tr>
				<tr>
					<td>Employee Status</td>
					<td><?php if($person['fld_ishired']==1){echo "Hired"; }else{echo "Not Hired";} ?></td>
				</tr>
			</table>
			<!-- end general tab -->
        </div> <!-- end tab 1 contents -->

        <?php if($person['fld_ishired']==1){ //only show payroll tab if person is hired ?>
        <!-- Tab 2 Contents -->
        <div id="tab_2_contents" class="tab_contents">
			<!-- payroll tab -->
			<table class="table table-striped">
				<tr>
					<th>Item</th>
					<th>Value</th>
				</tr>

				<tr>
					<td>Start Date</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_startdate.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_startdate'] ?></td>
				</tr>

				<tr>
					<td>End Date</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_enddate.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_enddate'] ?></td>
				</tr>

				<tr>
					<td>Employee ID</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_employeeid.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_employeeid'] ?></td>
				</tr>

				<tr>
					<td>Budget Code</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_budgetcode.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_budgetcode'] ?></td>
				</tr>

				<tr>
					<td>Employee rec num</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_employeerecnum.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_employeerecnum'] ?></td>
				</tr>

				<tr>
					<td>Current Rate</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_currentrate.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_currentrate'] ?></td>
				</tr>

				<tr>
					<td>New Rate</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_newrate.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_newrate'] ?></td>
				</tr>

				<tr>
					<td>Hours per week</td>
					<td id="hrsperweek"><?php echo $payroll['fld_hrsperweek'] ?></td>
				</tr>

				<tr>
					<td>Cost per week</td>
					<td id="costperweek"><?php echo $payroll['fld_costperweek'] ?></td>
				</tr>

				<tr>
					<td>Helpline Hours</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_hlhours.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_hlhours'] ?></td>
				</tr>
				
				<tr>
					<td>CDC Hours</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_cdchours.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_cdchours'] ?></td>
				</tr>
				
				<tr>
					<td>Helpline Cost</td>
					<td id="hlcost"><?php echo $payroll['fld_hlcost'] ?></td>
				</tr>
				
				<tr>
					<td>CDC Cost</td>
					<td id="cdccost"><?php echo $payroll['fld_cdccost'] ?></td>
				</tr>

				<tr>
					<td>Confidentiality Agreement</td>
					<td id="<?php echo $person['fld_hashkey'].".fld_confagreement.tbl_payroll" ?>" name= "derp" class="editDD"><?php echo $payroll['fld_confagreement'] ?></td>
				</tr>

				<tr>
					<td>Quizes Done</td>
					<!-- one td to display the current quizzes -->
					<td id="<?php echo $person['fld_hashkey'].".fld_quizzesdone.tbl_payroll" ?>" class="">
						<?php 
							// retrieve and segment all quizzes
							$quizzes = explode(",", $payroll['fld_quizzesdone']);
							echo "<select id='quizForm' form='quizForm'>";
							foreach($quizzes as $quiz){
								echo "<option value=". $quiz .">". $quiz ."</option>";
							}
							echo "</select>";
							
						?>
						<form id="quizForm">
						  <input type="button" onclick="removeVal()" value="Remove">
						</form>
					</td>
					<!-- one td to add a quiz -->
					<!-- <td id="<?php echo $person['fld_hashkey'].".fld_quizzesdone.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_quizzesdone'] ?></td> -->
					<!-- one td to remove a quiz -->
					<!-- <td id="<?php echo $person['fld_hashkey'].".fld_quizzesdone.tbl_payroll" ?>" class="edit"><?php echo $payroll['fld_quizzesdone'] ?></td> -->
				</tr>
			</table>
			<!-- end payroll tab -->
		</div> <!-- end tab 2 contents -->
		<?php } ?>

        <!-- Tab 3 Contents -->
        <div id="tab_3_contents" class="tab_contents">
			<!-- application tab -->
			<table class="table table-striped">
				<tr>
					<th>Item</th>
					<th>Value</th>
				</tr>

				<tr>
					<td>Previously worked</td>
					<td><?php echo $application['fld_prevworked'] ?></td>
				</tr>
					<td>Work eligible</td>
					<td><?php echo $application['fld_wrkeligible'] ?></td>
				<tr>
					<td>Graduate Student</td>
					<td><?php echo $application['fld_graduatestudent'] ?></td>
				</tr>
				<tr>
					<td>Work Study</td>
					<td><?php echo $application['fld_workstudy'] ?></td>
				</tr>	
				<tr>
					<td>Previous Employer Name</td>
					<td><?php echo $application['fld_employername'] ?></td>
				</tr>
				<tr>
					<td>Previous Employer Address</td>
					<td><?php echo $application['fld_employeraddress'] ?></td>
				</tr>
				<tr>
					<td>Previous Employer Phone</td>
					<td><?php echo $application['fld_employerphone'] ?></td>
				</tr>
				<tr>
					<td>Hours worked/week</td>
					<td><?php echo $application['fld_hrsworked'] ?></td>
				</tr>
				<tr>
					<td>Previously Job duties</td>
					<td><?php echo $application['fld_jobduties'] ?></td>
				</tr>
				<tr>
					<td>May we contact previous employer?</td>
					<td><?php echo $application['fld_maywecontact'] ?></td>
				</tr>
				<tr>
					<td>Reference Name</td>
					<td><?php echo $application['fld_refname'] ?></td>
				</tr>
				<tr>
					<td>Reference Phone</td>
					<td><?php echo $application['fld_refphone'] ?></td>
				</tr>
				<tr>
					<td>Reference Relationship</td>
					<td><?php echo $application['fld_refrelationship'] ?></td>
				</tr>
				<tr>
					<td>What makes you a good candidate?</td>
					<td><?php echo $application['fld_goodcandidate'] ?></td>
				</tr>
				<tr>
					<td>Previous Customer experience</td>
					<td><?php echo $application['fld_prevcustexperience'] ?></td>
				</tr>
				<tr>
					<td>Previous Computer Troubleshooting</td>
					<td><?php echo $application['fld_prevcts'] ?></td>
				</tr>
			</table>
			<!-- end application tab -->
		</div> <!-- end tab 3 contents -->
	</div> <!-- tabs_container -->