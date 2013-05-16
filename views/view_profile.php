<?php
	//only one result at index 0. lets reassign so we don't have to keep specifying index
	$data['person'] = $data['person'][0];
	$data['application'] = $data['application'][0];

	echo "<h1>".$data['person']['fld_firstname']." ".$data['person']['fld_lastname']."</h1><br />";

?>

	<h2 style="font-weight:bold">Application</h2>
	<p>Previously worked: <?php echo $data['application']['fld_prevworked'] ?></p>
	<p>Work eligible: <?php echo $data['application']['fld_wrkeligible'] ?></p>
	<p>Graduate Student: <?php echo $data['application']['fld_graduatestudent'] ?></p>
	<p>Work Study: <?php echo $data['application']['fld_workstudy'] ?></p>
	<p>Previous Employer: <?php echo $data['application']['fld_employername'] ?></p>
	<p>Previous Employer address: <?php echo $data['application']['fld_employeraddress'] ?></p>
	<p>Previous Employer Phone: <?php echo $data['application']['fld_employerphone'] ?></p>
	<p>Previous payrate: <?php echo $data['application']['fld_prevpayrate'] ?></p>
	<p>Hours worked/week: <?php echo $data['application']['fld_hrsworked'] ?></p>
	<p>Job Duties: <?php echo $data['application']['fld_jobduties'] ?></p>
	<p>Can contact previous employer?: <?php echo $data['application']['fld_maywecontact'] ?></p>
	<p>Reference name: <?php echo $data['application']['fld_refname'] ?></p>
	<p>Reference Phone: <?php echo $data['application']['fld_refphone'] ?></p>
	<p>Reference relationship: <?php echo $data['application']['fld_refrelationship'] ?></p>
	<p>What makes you a good candidate: <?php echo $data['application']['fld_goodcandidate'] ?></p>
	<p>Previous customer experience: <?php echo $data['application']['fld_prevcustexperience'] ?></p>
	<p>Previous Computer Troubleshooting experience: <?php echo $data['application']['fld_prevcts'] ?></p>