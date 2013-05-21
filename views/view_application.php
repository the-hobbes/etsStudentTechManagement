<?php
$applications = $data['applications'];
?>

<h2>ETS Applications</h2>

<div id='content' class='row-fluid'>
	<table id="applicationsTable" class="table table-striped">
		<thead>
			<tr>
				<th>Netid</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Submission Date</th>
				<th>Graduation Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
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

			?>
		</tbody>
	</table>

</div><!--end content-->
<script type="text/javascript">
	// sortable tables
	$(document).ready(function() 
	    { 
	        $("#applicationsTable").tablesorter(); 
	    } 
	); 

</script>
<?php

	