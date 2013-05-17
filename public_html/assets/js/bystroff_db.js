$(document).ready(function() {
	$(document).bind("ajaxStart", function() { 
		$("body").addClass("loading"); 
	}).bind("ajaxStop", function() { 
		$("body").removeClass("loading"); 
	});
});