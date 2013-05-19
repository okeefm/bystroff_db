$(document).ready(function() {
	Date.format = 'mm/dd/yyyy';
   	$('.date-pick').datePicker(
		{
			startDate: '01/01/2000',
			endDate: (new Date()).asString()
		}
	);

	$("#reset").click(function(e) {
		e.preventDefault();
		$("#sampleName").val("");
		$("#location").val("");
		$("#sublocation").val("");
		$("#box").val("");
		$("#sampleDate").val("");
		$("#type").val("");
		$("#sequence").val("");
	});
	
	$("select.loc").change(function(e) {
		var nextId = null;
		switch ($(this).attr("id")) {
			case "locations":
			nextId = "sublocations";
			break;
			case "sublocations":
			nextId = "boxes";
			break;
		}
		$("#" + nextId).load("ajax/location_select.php", 
		{ next: nextId, id: $(this).val()},
		function(data) {
			$("." + nextId).removeAttr("disabled");
			if (nextId != "boxes") {
				$(".boxes").prop("disabled", true);
				$(".boxes option").replaceWith("<option value='' disabled selected>Select room and location:</option>");
			}
		});
	});
	
 });