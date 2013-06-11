$(document).ready(function() {
	$("#results").dataTable();
	
	var edit = {
		init: function () {
			$("a.edit").click(function(e) {
				e.preventDefault();
				
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
			$("a.delete").click(function(e) {
				e.preventDefault();
				
				if (confirm("Are you sure you want to delete this sample?")) {
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
});