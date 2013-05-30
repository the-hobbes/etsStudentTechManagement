<div id='content' class='row-fluid'>
	<div class='span12 main'>
		<h2>ETS Employees</h2>

		<!-- results from query go here -->
		<table id="employeeTable"class="table table-striped tablesorter">
			<thead>
				<tr>
					<th>Netid</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Middle Initial</th>
					<th>Email</th>
					<th>Sched. Code</th>
					<th>Major</th>
					<th>Grad Date</th>
					<th>Phone</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($data['people'] as $person){
						$html="
							<tr>
								<td><a href=\"".siteURL('people/profile/'.$person['pk_netid'])."#general\">".$person['pk_netid']."</td>
								<td>".$person['fld_firstname']."</td>
								<td>".$person['fld_lastname']."</td>
								<td>".$person['fld_middleinitial']."</td>
								<td>".$person['fld_email']."</td>
								<td>".$person['fld_schedulecode']."</td>
								<td>".$person['fld_major']."</td>
								<td>".$person['fld_graddate']."</td>
								<td>".$person['fld_phone']."</td>
							</tr>
						";
						echo $html;
					}
				?>
			</tbody>
		</table>

<!-- http://www.appelsiini.net/projects/jeditable -->

</div> <!-- end content -->
<script type="text/javascript">
	// sortable tables
	$(document).ready(function() 
	    { 
	        $("#employeeTable").tablesorter(); 
	    } 
	); 

</script>