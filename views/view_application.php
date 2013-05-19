<?php
$applications = $data['applications'];
?>

<h2>ETS Applications</h2>

<div id='content' class='row-fluid'>
	<table class="table table-striped">
		<tr>
			<th>Netid</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Submission Date</th>
			<th>Graduation Date</th>
		</tr>

		<?php
		if(sizeof($applications)==0){
			echo "<p>There are currently no new applications</p>";
		}else{

			foreach($applications as $application){
				$html = "<tr>
								<td><a href=\"".siteURL('people/profile/'.$application['pk_netid'])."#application\">".$application['pk_netid']."</a></td>
								<td>".$application['fld_firstname']."</td>
								<td>".$application['fld_lastname']."</td>
								<td>".$application['fld_submissiondate']."</td>
								<td>".$application['fld_graddate']."</td>
						</tr>";
				echo $html;

			}
		}
		?>


	</table>

</div><!--end content-->

<?php

	