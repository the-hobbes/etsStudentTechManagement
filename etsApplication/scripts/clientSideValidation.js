//run when the document has fully loaded
// $(document).ready(function(){
// });//end document ready

/*
	validateForm
	Used to validate the entire form when submit its clicked. 
	If not valid, will rerender the page with errors.
	If indeed valid, forward the contents of the submission on to the server. 
*/
function validateForm(){
	//validator variable
	errors = 0;
	//get all text field inputs
	var $textInputs = $('#applicationForm :input[type="text"]');
	//loop through each text input 
	$textInputs.each(function() {
		//if the input is required and empty, add a red background to it and display an error
		if( $(this).prev().hasClass('required') && ($(this).val().length < 1) ){
			// console.log("required");
			$(this).addClass('error');

			if($(this).attr('name') == 'emailAddress')
				$(this).after('<span class="errorMessage">**Need a Valid Email**</span>');
			else if($(this).attr('name') == 'zipCode')
				$(this).after('<span class="errorMessage">**Need a Valid ZipCode**</span>');
			else
				$(this).after('<span class="errorMessage">**This Field Is Required**</span>');

			errors++;
		}//end if
		else{
			$(this).removeClass('error');
		}
	});//end each loop for textInputs

	// if there are no errors, then the form is valid, client side. Pass it to server for validation
	if(errors == 0){

		var dict = [];
		var $allInputs = $('#applicationForm :input');
		$allInputs.each(function() {
			// console.log($(this).attr('name'));
		    dict.push({
			    key:   $(this).attr('name'),
			    value: $(this).attr('value'),
			    checked: $(this).attr('checked')
			});
		});

		dict = JSON.stringify(dict);
		// POST to the server
		$.post("php/formProcessor.php", { data: dict} )

		//success function
		.done(function(data) {
		  // alert("Data Loaded: " + data);
		  if(data){
		  	//do something, because form didn't validate
		  	alert("You've got the following errors: " + data)
		  }
		  else{
		  	//form validated, redirect
		  	window.location.replace("http://www.uvm.edu/~helpline/etsApplication/thanks.php");
		  }
		});
	}
	else{
		// there are errors. Scroll back to the top
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}
}

/*
	lookup
	Used to validate the required parts of the form, and called on each keyup in the form.
	If the item calling the lookup is valid, then nothing will happen. If it is not, then it will be turned red.
*/
function lookup(arg){
	var value = arg.value;
	var sourceObject = $(arg); //convert to jquery object

	// console.log(value);
	// console.log(sourceObject.attr('name'));

	if (value.length < 1){
		//is it empty? it shouldn't be. show an error
		sourceObject.addClass('error');
		// sourceObject.after('<span class="errorMessage">**This Field is Required**</span>');
	}
	else{
		//there is stuff in there. take away the error class and the error message
		// sourceObject.next().remove();
		sourceObject.removeClass('error');

		//if the source object is an email, check to see if it is valid
		if(sourceObject.attr('name') == "emailAddress"){
			isValid = isEmail(value);
			if(isValid == true)
				sourceObject.removeClass('error');
			else
				sourceObject.addClass('error');
		}
		//if the source object is a zipcode, check to see if it is valid
		if(sourceObject.attr('name') == "zipCode"){
			if (arg.value != arg.value.replace(/[^0-9,-\.]/g, '')) {
				arg.value = arg.value.replace(/[^0-9,-\.]/g, '');
				sourceObject.addClass('error');
			}
			else
				sourceObject.removeClass('error');
		}
	}//end else
}//end lookup
/*
	isEmail
	Uses regular expressions to determine if the email is in a valid format. 
*/
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  // console.log(regex.test(email));
  return regex.test(email);
}