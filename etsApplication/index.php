<!doctype html>
	<head>
		<title>ETS Student Technician Application</title>		
		<link rel="stylesheet" href="css/style.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="scripts/clientSideValidation.js"></script>
	</head>

	<body>
		<?php //include("php/useLdap.php");?>
		<?php //$userName= getenv('REMOTE_USER');?>
		<p><?php //useLDAP($userName); ?></p>
		<div id="main">
			<table id="uvmHeading" width="600" cellpadding="0" cellspacing="0" style="font-family: arial,sans-serif; text-align:center; color:#fff;" >
			  <tr>
			    <td style="width:90px"><a href="http://www.uvm.edu"><img moz-do-not-send="true" src="http://www.uvm.edu/www/images/templates/tower2010.gif" width="62" height="74" alt="UVM Tower" border="0" style="margin-bottom:-20px; border:1px solid #fff; z-index:100;"></a></td>
			    <td valign="bottom" style="text-align:left; padding-bottom:5px;"><img moz-do-not-send="true" src="http://www.uvm.edu/www/images/templates/uvmlogo-words.gif" width="290" height="31" alt="The University of Vermont"></td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr bgcolor="#8AA352">
			    <td bgcolor="#8AA352" style="padding-bottom: .6em;padding-top:.6em;">&nbsp;</td>
			    <td  style="width:340px; text-align:left; text-transform:uppercase; font-size:11px;">Enterprise Client Services</td>
			    <td bgcolor="#8AA352" style="text-transform:uppercase; text-align:right; padding-left:10px; padding-right:5px; font-size:11px;"><a href="http://www.uvm.edu/it/help/?Page=CDCjobs.html" target="_blank">Student Application</td>
			  </tr>
			</table>

			<hr>

			<div id="instructions">
				<p>Please fill out the following form to be considered for an ETS Student technician position. Note that required
					fields are marked in by  <span style="color:#FF3030;">**</span>.</p>
			</div>

			<form id="applicationForm" action="#">
				<fieldset>
					<legend>Personal Information:</legend>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>Last Name:</span>
						<input type="text" name="lastName" onkeyup="lookup(this);" value="<?php //echo $lastName; ?>">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>First Name:</span>
						<input type="text" name="firstName" onkeyup="lookup(this);" value="<?php //echo $firstName; ?>">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>Middle Initial:</span>
						<input type="text" name="middleInitial" onkeyup="lookup(this);">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>Street Address:</span>
						<input type="text" name="streetAddress" onkeyup="lookup(this);">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>Zip Code:</span>
						<input type="text" name="zipCode" onkeyup="lookup(this);">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>Email Address:</span>
						<input type="text" name="emailAddress" onkeyup="lookup(this);">
					</label>				

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>UVM NetID:</span>
						<input type="text" name="netId" onkeyup="lookup(this);" value="<?php //echo $netID; ?>">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>UVM Major:</span>
						<input type="text" name="major" onkeyup="lookup(this);">
					</label><!--end UVM Information-->	
					
					<label>
						<div class="required"><span style="color:#FF3030;">**</span>You are eligible to work in the United States:</div>
						<input id="eUS1" type="radio" name="eligibility" value="true" checked="checked"><label for="eUS1" style="display:inline;">True</label>
						<input id="eUS2" type="radio" name="eligibility" value="false"> <label for="eUS2" style="display:inline;">False</label>
					</label>		
				</fieldset>

				<fieldset>
					<legend>UVM Specific Information</legend>

					<label>
						<div>Have you previously worked for UVM?</div>
						<input id="pw1" type="radio" name="previousWork" value="yes" checked="checked"><label for="pw1" style="display:inline;">Yes</label>
						<input id="pw2" type="radio" name="previousWork" value="no"> <label for="pw2" style="display:inline;">No</label>
					</label>

					<label>
						<div>Are you currently an Undergraduate student at UVM?</div>
						<input id="cUG1" type="radio" name="undergradStudent" value="yes" checked="checked"><label for="cUG1" style="display:inline;">Yes</label>
						<input id="cUG2" type="radio" name="undergradStudent" value="no"> <label for="cUG2" style="display:inline;">No</label>
					</label>

					<label>
						<div>Are you currently an Graduate student at UVM?</div>
						<input id="cG1" type="radio" name="gradStudent" value="yes" checked="checked"><label for="cG1" style="display:inline;">Yes</label>
						<input id="cG2" type="radio" name="gradStudent" value="no"> <label for="cG2" style="display:inline;">No</label>
					</label>

					<label>
						<span>If you are a UVM student, in how many credits are you enrolled?</span>
						<input type="text" name="credits">
					</label>

					<label>
						<span class="required"><span style="color:#FF3030;">**</span>What is your expected date of graduation?</span>
						<input type="text" name="gradDate" onkeyup="lookup(this);">
					</label>

					<label>
						<span>Enter any work study award amount (if applicable):</span>
						<input type="text" name="workStudyAmount">
					</label>
				</fieldset><!-- end UVM Specific Information-->
				
				<fieldset>
					<legend>Previous Employment</legend>

					<label>
						<span>Employer Name:</span>
						<input type="text" name="employerName">
					</label>

					<label>
						<span>Employer Address:</span>
						<input type="text" name="employerAddress">
					</label>

					<label>
						<span>Employer Phone Number:</span>
						<input type="text" name="employerPhone">
					</label>

					<label>
						<span>Pay Rate:</span>
						<input type="text" name="payRate">
					</label>

					<label>
						<span>Hours worked per week:</span>
						<input type="text" name="hoursPerWeek">
					</label>

					<label>
						<div>Job Duties:</div>
						<textarea name="jobDuties"></textarea>
					</label>

					<label>
						<div>May we contact this employer?</div>
						<input id="mwc1" type="radio" name="contactEmployer" value="yes" checked="checked"><label for="mwc1" style="display:inline;">Yes</label>
						<input id="mwc2" type="radio" name="contactEmployer" value="no"> <label for="mwc2" style="display:inline;">No</label>
					</label>
				</fieldset><!-- end Previous Employment-->

				<fieldset>
					<legend>References</legend>

					<label>
						<span>Reference Name:</span>
						<input type="text" name="referenceName">
					</label>

					<label>
						<span>Reference Phone Number:</span>
						<input type="text" name="referencePhone">
					</label>

					<label>
						<span>Reference Relationship:</span>
						<input type="text" name="referenceRelation">
					</label>
				</fieldset><!-- end References-->

				<fieldset>
					<legend>Candidate Information</legend>

					<label>
						<div>Tell us what makes you a good candidate for this job:</div>
						<textarea name="goodCandidate"></textarea>
					</label>

					<label>
						<div>Describe any previous customer service experience you have had:</div>
						<textarea name="csExperience"></textarea>
					</label>

					<label>
						<div>Describe any computer troubleshooting service experience you have had:</div>
						<textarea name="ctsExperience"></textarea>
					</label>
				</fieldset><!-- end candiate information-->

				<input class="submit" type="button" value="Submit" name="submitted" onclick="validateForm()"/>

			</form><!--end application form-->

			<footer>
				<h3>Enterprise Client Services, UVM</h3>
			</footer>
		</div><!-- end main -->
	</body>
</html>