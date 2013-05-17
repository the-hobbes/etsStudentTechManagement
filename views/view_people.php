
<div id='content' class='row-fluid'>
	<div class='span12 main'>
		<h2>ETS Employees</h2>

		<!-- results from query go here -->
		<table class="table table-striped">
			<tr>
				<th>Netid</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Middle Initial</th>
				<th>Email</th>
				<th>Major</th>
				<th>Grad Date</th>
				<th>Phone</th>
			</tr>
		<?php
			foreach($data['people'] as $person){
				$html="
					<tr>
						<td><a href=\"".siteURL('people/profile/'.$person['pk_netid'])."\">".$person['pk_netid']."</td>
						<td class='editInPlace'>".$person['fld_firstname']."</td>
						<td class='editInPlace'>".$person['fld_lastname']."</td>
						<td class='editInPlace'>".$person['fld_middleinitial']."</td>
						<td class='editInPlace'>".$person['fld_email']."</td>
						<td class='editInPlace'>".$person['fld_major']."</td>
						<td class='editInPlace'>".$person['fld_graddate']."</td>
						<td class='editInPlace'>".$person['fld_phone']."</td>
					</tr>
				";
				echo $html;
			}
		?>
		</table>

<!-- http://www.appelsiini.net/projects/jeditable -->

</div> <!-- end content -->