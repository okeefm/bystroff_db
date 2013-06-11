$(document).ready(function() {
	Date.format = 'yyyy-mm-dd';
   	$('.date-pick').datePicker(
		{
			startDate: '01/01/2000',
			endDate: (new Date()).asString()
		}
	);
	
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
	
	$("#reset").click(function(e) {
		e.preventDefault();
		$("#sampleName").val("");
		$("#locations").val("");
		$("#sublocations").html("<option value='' disabled selected>Select a room first:</option>");
		$("#sublocations").prop("disabled", true);
		$("#boxes").html("<option value='' disabled selected>Select room and location:</option>");
		$("#boxes").prop("disabled", true);
		$("#sampleDate").val("");
		$("#owners").val("");
		$("#type").val("");
		$("#sequence").val("");
	});
	
 });