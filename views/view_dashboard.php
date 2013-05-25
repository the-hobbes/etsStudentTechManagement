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
   
      <?php print_r($data['quizzes']); ?>

    </div>
  </div>
</div>


</div><!--end content-->