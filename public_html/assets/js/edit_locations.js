$(document).ready(function() {

	var edit = {
		init: function () {
			$("input.edit").click(function(e) {
				e.preventDefault();
				console.log(this);
				var option = $(this).prev().find("select option:selected");
				if (option.val() == "") {
					alert("Please select an object to edit");
					return false;
				}
				
				$("#editDialog").modal({
					autoResize:true,
					overlayClose:true,
					onOpen: edit.open(option)
				});
				
				$("#editConfirm").click(function(e) {
					e.preventDefault();
					if (confirm("Are you sure you want to edit this?")) {
						console.log("foo");
						$.post("ajax/update_location.php",
						{ id: $("#editInput").data("id"), value: $("#editInput").val()},
						function(data) {
							console.log(data);
							alert("Item successfully edited.");
							$("#editCancel").click();
							location.reload();
						});
					}
				});
			});
			
		},
		
		//this gets run when the modal is opened, and adds the option text to the text box, and option value as data
		open: function(option) {
			$("#editInput").val(option.text());
			$("#editInput").data("id", option.val());
		}

	}
	
	edit.init();
	
});