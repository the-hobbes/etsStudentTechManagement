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
<script type="text/javascript">

</script>


<script>
	$(document).ready(function(){

		// text area show and hide
		$("#denyArea").focus(function() {
		    if( $(this).val() == "Please enter the reason for rejection." ) {
		        $(this).val("");
		    }
		});
		$("#denyArea").blur(function() {
		    if( $(this).val() == "" ) {
		        $(this).val("Please enter the reason for rejection.");
		    }
		});

		// prevent default form submission, and instead send ajax to server
		$('#denyForm').on("submit", function(e) {
	        //stop the form from being submitted
	        e.preventDefault();
	        var reason = $('textarea').val();
	        hashkey = $('textarea').attr('id');
	        sendData = {'hashkey': hashkey, 'reason': reason};

	        $.ajax({
                    type: "POST",
                    url: siteURL + "applications/deny",
                    data: sendData
                }).done(function(data){
                	// console.log("returned from the client side with this: " + data);               	
   					// when this is saved, reload the application page
   					location.reload();
   					// set the Hire | Deny field to DENIED
            });//end ajax 
	        
	    }); // end denyform submit

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
		}); // end hire function


		$('.btnDeny').click(function(){
			choice = confirm("Deny application?");
			hashkey = $(this).attr('id');
			//'okay' selected
			if(choice){
				$('#denyForm').show();
				$('textarea').attr("id",hashkey);
			}
		}); // end deny function

	}); // end document function

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

	<div id="denyForm">
		<form>
			<textarea id="denyArea" style="margin:0px auto; width:200px; height: 200px;">Please enter the reason for rejection.</textarea>
			<br>
			<input type="submit" value="Submit" style="margin-top:3px;">
		</form> <!-- end denyForm -->
	</div?

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

	