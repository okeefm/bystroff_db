$(document).ready(function() {

	var edit = {
		init: function () {
			$("input.edit").click(function(e) {
				e.preventDefault();

				var selectId = $(this).prev().prev().find("select").attr("id");
				var option = $(this).prev().prev().find("select option:selected");
				if (option.val() == "") {
					alert("Please select an object to edit");
					return false;
				}
				
				$("#editDialog").modal({
					autoResize:true,
					overlayClose:true
					});
				
				$("#editConfirm").data("type", "edit");
				$("#editInput").val(option.text());
				$("#editInput").data("id", option.val());
				$("#editInput").data("selectId", selectId);
				$("#editTitle").text("Edit");
			});
			
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
	
	var add = {
		init: function() {
			$("input.add").click(function(e) {
				e.preventDefault();
				
				var si = $(this).prev().find("select").attr("id");
				
				$("#editDialog").modal({
					autoResize:true,
					overlayClose:true
				});
				
				$("#editConfirm").data("type", "add");
				
				$("#editInput").data("selectId", si);
				switch (si) {
					case "boxes":
						$("#editInput").data("sublocation", $("#sublocations option:selected").val());
					case "sublocations":
						$("#editInput").data("location", $("#locations option:selected").val());
						break;
				}
				$("#editTitle").text("Add");
				
			});
		}
	}
	
	add.init();
	edit.init();
	del.init();
	
	$("#editConfirm").click(function(e) {
		e.preventDefault();
		if ($(this).data("type") == "edit") {
			if (confirm("Are you sure you want to edit this?")) {
				$.post("ajax/update_location.php",
				{ id: $("#editInput").data("id"), value: $("#editInput").val(), selectId: $("#editInput").data("selectId")},
				function(data) {
					console.log(data);
					if (data == "success") {
						alert("Item successfully edited.");
						$("#editCancel").click();
						location.reload();
					} else {
						alert("Edit failed!");
					}
				});
			}
		} else if ($(this).data("type") == "add") {
			$.post("ajax/add_location.php",
				{value: $("#editInput").val(), selectId: $("#editInput").data("selectId"), location: $("#editInput").data("location"), sublocation: $("#editInput").data("sublocation")},
				function(data) {
					console.log(data);
					if (data == "success") {
						alert("Item successfully added.");
						$("#editCancel").click();
						location.reload();
					} else {
						alert("Add failed!");
					}
				});
		}
	});
	
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