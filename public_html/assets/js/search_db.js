$(document).ready(function() {
	var dataTable = $("#results").dataTable();
	
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
					$.post("ajax/delete_sample.php",
						{ id: $(this).data("id") },
						function(data) {
							if (data == "success") {
								alert("Sample successfully deleted.");
								console.log($("tr").index($(e.target).parents("tr")));
								dataTable.fnDeleteRow($("tr").index($(e.target).parents("tr")) - 2);
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