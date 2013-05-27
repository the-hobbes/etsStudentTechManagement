<div id='content' class='row-fluid'>
<br />
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">General</a></li>
    <li><a href="#tab2" data-toggle="tab">Quizzes</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>General settings here: where application sends email to, more if I can think of them</p>
    </div>
    <div class="tab-pane" id="tab2">
      <p>Quiz settings. Add new available quizzes, view all </p>
   		
   		<table class="table table-striped">
   			<tr>
   				<th>Available Quizzes</th>
   			</tr>

   			<?php
   			foreach($data['quizzes'] as $quiz){
   				$html="
   					<tr>
   						<td>".$quiz['pk_quiz']."</td>
   					</tr>
   				";

   				echo $html;
   			}


   			?>
   			

   		</table>

   		<form action="<?php echo siteURL('dashboard/addquiz') ?>" method="post">
   			<input type="text" name="txtQuiz" />

   			<input type="submit" value="Add Quiz" />
   		</form>

    </div>
  </div>
</div>


</div><!--end content-->