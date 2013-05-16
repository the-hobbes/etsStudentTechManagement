 $(document).ready(function() {
 	console.log('derp')
     $('.edit').editable('http://localhost/ETS/payroll/update', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'
     });
 });