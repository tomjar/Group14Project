$(document).ready(function() {
//typical functions or events for every page



	$(".block-default").click(function(e) {
		//stops page refresh for elements that have this class
		return false;
	})


	$(".login").click(function(e) {
		//trigger login modal
		$("#login").modal();
	});

	$(".register").click(function(e) {
		//trigger register modal
		$("#register").modal();
	});

	$(".search").keypress(function(event) {
		//should be used to capture enter key for searchbars
		if (event.which=="13") {
		window.location.href =window.location.origin+"/listing.html?search="+$(this).val();
		}
		console.log(this.value);
	});

});