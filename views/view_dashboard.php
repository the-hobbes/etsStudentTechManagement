<script>

$(document).ready(function(){

// Handle tab clicks
      $('.tab').click(function () {

        // Remove the 'active' class from the active tab.
        $('#tabs_container > .nav-tabs > li.active').removeClass('active');

        // Add the 'active' class to the clicked tab.
        $(this).addClass('active');

        // Remove the 'tab_contents_active' class from the visible tab contents.
        $('.tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');

        // Add the 'tab_contents_active' class to the associated tab contents.
        var whichTab = $(this).attr('rel');
        $('.tab_contents_container > ' + whichTab).addClass('tab_contents_active');


        // this prevents the click from being followed and thus jumping to the top of the page because of '#'
        //return false;
      });

      //updates the tab when it gets switch programatically
      $('.tab').on('show', function(e){
        $('#tabs_container > .nav-tabs > li.active').removeClass('active');

        // Add the 'active' class to the clicked tab.
        $(this).addClass('active');

        // Remove the 'tab_contents_active' class from the visible tab contents.
        $('.tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');

        // Add the 'tab_contents_active' class to the associated tab contents.
        var whichTab = $(this).attr('rel');
        $('.tab_contents_container > ' + whichTab).addClass('tab_contents_active');


        // this prevents the click from being followed and thus jumping to the top of the page because of '#'
        //return false;

      });

      tab = document.URL.split("#");
      tab = tab[1];

        //switch tab based on url;
      if(tab == "general"){
        $('#general a').tab('show');
      }
      if(tab == "quizzes"){
        $('#quizzes a').tab('show'); 
      }

});

</script>

<div id='content' class='row-fluid'>
<br />

<div id="tabs_container" class="span11">

    <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
      <li id="general" class="active tab" rel="#tab_1_contents"><a href="#general"><h3>General</h3></a></li>
      <li id="quizzes" class="tab" rel="#tab_2_contents"><a href="#quizzes"><h3>Quizzes</h3></a></li>
    
    </ul>


    <div class="tab_contents_container">
      <div id="tab_1_contents" class="tab_contents tab_contents_active">
        <p>General settings here: where application sends email to, more if I can think of them</p>
      </div>
       <div id="tab_2_contents" class="tab_contents">
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

      </div><!--end quiz tab-->
    </div>
  
</div><!--end tab container-->


</div><!--end content-->