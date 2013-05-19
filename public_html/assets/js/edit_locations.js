$(document).ready(function() {

	var edit = {
		init: function () {
			$("input.edit").click(function(e) {
				e.preventDefault();
				
				console.log($(this))
				var selectId = $(this).prev().prev().find("select").attr("id");
				var option = $(this).prev().prev().find("select option:selected");
				if (option.val() == "") {
					alert("Please select an object to edit");
					return false;
				}
				
				$("#editDialog").modal({
					autoResize:true,
					overlayClose:true,
					onOpen: edit.open(option, selectId)
				});
				
				$("#editConfirm").click(function(e) {
					e.preventDefault();
					if (confirm("Are you sure you want to edit this?")) {
						console.log("foo");
						$.post("ajax/update_location.php",
						{ id: $("#editInput").data("id"), value: $("#editInput").val(), selectId: $("#editInput").data("selectId")},
						function(data) {
							console.log(data);
							if (data == "success") {
								alert("Item successfully edited.");
								$("#editCancel").click();
								location.reload();
							} else {
								alert("Update failed!");
							}
						});
					}
				});
			});
			
		},
		
		//this gets run when the modal is opened, and adds the option text to the text box, and option value as data
		open: function(option, selectId) {
			$("#editInput").val(option.text());
			$("#editInput").data("id", option.val());
			$("#editInput").data("selectId", selectId);
		}

	}
	
	var del = {
		init: function() {
			$("input.delete").click(function(e) {
				e.preventDefault();
				
				var si = $(this).prev().prev().prev().find("select").attr("id");
				var option = $(this).prev().prev().prev().find("select option:selected").val();
				
				if (option == "") {
					alert("Please select an object to delete");
					return false;
				}
				
				if (confirm("Are you sure you want to delete this?")) {
					$.post("ajax/delete_location.php",
						{ id: option, selectId: si},
						function(data) {
							if (data == "success") {
								alert("Item successfully deleted.");
								location.reload();
							} else {
								alert("Delete failed!");
							}
						});
				}
			});

		}
	}
	
	edit.init();
	del.init();
	
	$("select").change(function(e) {
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