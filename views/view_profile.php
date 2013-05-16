<?php
	$person = $data['person'];
	$application = $data['application'];
	$payroll = $data['payroll'];

	echo "<h1>".$data['person']['fld_firstname']." ".$data['person']['fld_lastname']." - ".$person['pk_netid']."</h1><br />";

?>
	<h3>General</h3>
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
			<td><?php echo $person['fld_streetaddress'] ?></td>
		</tr>
		<tr>
			<td>Zip Code</td>
			<td><?php echo $person['fld_zipcode'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $person['fld_email'] ?></td>
		</tr>
		<tr>
			<td>Graduation Date</td>
			<td><?php echo $person['fld_graddate'] ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $person['fld_phone'] ?></td>
		</tr>
		<tr>
			<td>Schedule Code</td>
			<td><?php echo $person['fld_schedulecode'] ?></td>
		</tr>
	</table>


	<h3>Payroll</h3>
	<table class="table table-striped">
		<tr>
			<th>Item</th>
			<th>Value</th>
		</tr>

		<tr>
			<td>Start Date</td>
			<td><?php echo $payroll['fld_startdate'] ?></td>
		</tr>

		<tr>
			<td>End Date</td>
			<td><?php echo $payroll['fld_enddate'] ?></td>
		</tr>

		<tr>
			<td>Employee ID</td>
			<td><?php echo $payroll['fld_employeeid'] ?></td>
		</tr>

		<tr>
			<td>Budget Code</td>
			<td><?php echo $payroll['fld_budgetcode'] ?></td>
		</tr>

		<tr>
			<td>Employee rec num</td>
			<td><?php echo $payroll['fld_employeerecnum'] ?></td>
		</tr>

		<tr>
			<td>Current Rate</td>
			<td>&#36;<?php echo $payroll['fld_currentrate'] ?></td>
		</tr>

		<tr>
			<td>New Rate</td>
			<td>&#36;<?php echo $payroll['fld_newrate'] ?></td>
		</tr>

		<tr>
			<td>Hours per week</td>
			<td><?php echo $payroll['fld_hrsperweek'] ?></td>
		</tr>

		<tr>
			<td>Cost per week</td>
			<td>&#36;<?php echo $payroll['fld_costperweek'] ?></td>
		</tr>

		<tr>
			<td>Helpline Hours</td>
			<td><?php echo $payroll['fld_hlhours'] ?></td>
		</tr>
		
		<tr>
			<td>CDC Hours</td>
			<td><?php echo $payroll['fld_cdchours'] ?></td>
		</tr>
		
		<tr>
			<td>Helpline Cost</td>
			<td>&#36;<?php echo $payroll['fld_hlcost'] ?></td>
		</tr>
		
		<tr>
			<td>CDC Cost</td>
			<td>&#36;<?php echo $payroll['fld_cdccost'] ?></td>
		</tr>

		<tr>
			<td>Confidentiality Agreement</td>
			<td><?php echo $payroll['fld_confagreement'] ?></td>
		</tr>

		<tr>
			<td>Quizes Done</td>
			<td><?php echo $payroll['fld_quizzesdone'] ?></td>
		</tr>


	</table>
	

	<br />

	<h3>Application</h3>

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



