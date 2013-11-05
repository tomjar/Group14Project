$(document).ready(function() {
//typical functions or events for every page



	$(".block-default").click(function(e) {
		//stops page refresh for elements that have this class
		return false;
	})


	$(".login").click(function(e) {
		//trigger login modal
		$("#login").modal('toggle');
	});
	$(".login-submit").click(function(e) {
		//check if valid inputs (later)

		//send object of login data via ajax

		//if success dismiss modal, and redirect
		$("#login").modal('toggle');
	});

	$(".register").click(function(e) {
		//trigger register modal
		$("#register").modal('toggle');
	});
	$(".register-submit").click(function(e) {
		//check if valid inputs (later)

		//send object of register data via ajax

		//if success dismiss modal, and redirect
		$("#register").modal('toggle');
	});
	$(".search").keypress(function(event) {
		//should be used to capture enter key for searchbars
		if (event.which=="13") {
		window.location.href =window.location.origin+"/listing.html?search="+$(this).val();
		}
		console.log(this.value);
	});

});