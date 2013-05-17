 $(document).ready(function() {

     $('.edit').editable('http://localhost/etsStudentTechManagement/people/update', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...',
         id	   	   : 'elementid',
         name      : 'newval',
         onsubmit  : function(settings, td){
         	option = confirm("Are you sure you want to update value?");
         	return option;
         }
     });
 });