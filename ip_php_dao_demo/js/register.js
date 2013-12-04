$(document).ready(function() {
	testStatusRadio();
		$("#back").click(function() {
			$(location).attr('href',"index_router.php?page=login");
		});
	
		$("#registrationForm").validate({
		rules: {
			password: {
				required: true,
				minlength: 5,
				// TODO replace this by a real password validation page and uncomment.
				//remote: "password.action"
			},
			password2: {
				required: true,
				minlength: 5,
				equalTo: '#password'
			},
		},
		messages: {
				password: {
					required: "Please provide a password",
					minLength: "Your password must be at least 5 characters long" 
				}
		}
	});
	
	$('input[name=status]').change(testStatusRadio);
	
	//$("#confirmButton").click(validateForm);
	
});

function testStatusRadio() {
	var statusValue = $('input[name=status]:checked').val();
    if ( statusValue == "student" ) {
		$("#specialityLabel").hide();
		$("#yearLabel").show();
	} else if ( statusValue == "teacher" ) {
		$("#specialityLabel").show();
		$("#yearLabel").hide();
    } else {
		//if no radio is selected, we welect by default the student one
		$("#specialityLabel").hide();
		$("#yearLabel").show();
		$('input[name=status]').filter('[value=student]').prop('checked', true);
	}
}
