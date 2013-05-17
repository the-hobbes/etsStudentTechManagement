<div id='content' class='row-fluid'>
	<div class='span12 main'>
		<h2>ETS Payroll</h2>

		<!-- results from query go here -->
		<table class="table table-striped">
			<tr>
				<th>Netid</th>
				<th>Start Date</th>
				<th>Current Rate</th>
				<th>New Rate</th>
				<th>Hours/Week</th>
				<th>Cost/Week</th>
				<th>HL Hours</th>
				<th>CDC Hours</th>
			</tr>
		<?php
		
			foreach($data['payroll'] as $payroll){
				$html="
					<tr>
						<td><a href=\"".siteURL('people/profile/'.$payroll['fk_netid'])."\">".$payroll['fk_netid']."</td>
						<td>".$payroll['fld_startdate']."</td>
						<td>&#36;".$payroll['fld_currentrate']."</td>
						<td>&#36;".$payroll['fld_newrate']."</td>
						<td>".$payroll['fld_hrsperweek']."</td>
						<td>&#36;".$payroll['fld_costperweek']."</td>
						<td>".$payroll['fld_hlhours']."</td>
						<td>".$payroll['fld_cdchours']."</td>
					</tr>
				";
				echo $html;
			}
			
		?>
		</table>

		<h3>Totals</h3>
		<table class="table table-striped">
			<tr>
				<th>Hours/Week</th>
				<th>Cost/Week</th>
				<th>HL Hours</th>
				<th>CDC Hours</td>
			</tr>
		<?php

			$html = "
			<tr>
				<td>".$data['total_hrsperweek']."</td>
				<td>&#36;".$data['total_costperweek']."</td>
				<td>".$data['total_hlhours']."</td>
				<td>".$data['total_cdchours']."</td>
			</tr>";
			echo $html;
			//print_r($result);
		?>

		</table>
</div> <!-- end content -->