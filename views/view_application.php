<?php
/*
/view_application.php
/
/-Main view located at: <url>/application
/-List applicants
/
*/
$applications = $data['applications'];
?>
<script>
	$(document).ready(function(){

		$('.btnHire').click(function(){
			choice = confirm("Are you sure you would like to hire this applicant?");

			hashkey = $(this).attr('id');
			//'Okay' selected
			if(choice){

			 	$.ajax({
                    type: "POST",
                    url: siteURL + "applications/hire",
                    data: {hashkey: hashkey}
                }).done(function(data){
   					location.reload();
                });//end ajax  
			}
			

		});


		$('.btnDeny').click(function(){
			choice = confirm("Deny application?");

			//'okay' selected
			if(choice){

			}

		});

	});

</script>

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
				<th></th>
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
								<td><a id=\"".$application['fld_hashkey']."\" class=\"btnHire\" href=\"#\">Hire</a> | <a id=\"".$application['fld_hashkey']."\" class=\"btnDeny\" href=\"#\">Deny</a></td>
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

	