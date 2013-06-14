<?php include "header.php"; ?>

<?php
	if (isset($_REQUEST['id'])) {
		$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
		$stmt = $mysqli->prepare("SELECT id, Name_of_Sample, Location, Sublocation, Box, Owner, Date, Type, Gi_number, Sequence, Comments, Concentration, Amount, Purity FROM samples WHERE id = ?;");
		$stmt->bind_param("d", $_REQUEST['id']);
		if($stmt->execute()) {
			$res = $stmt->get_result();
			$edit_row = $res->fetch_assoc();
			$edit = True;
		}
	}
?>

<div class="container">

	<h2>Edit Sample</h2>
	<div class="well">
		<form class="form-horizontal" action="edit_sample.php" method="POST">

			<?php 
			include "form_internals.php";
			
			include "new_sample_additions.php"; ?>
			<input class="btn" type="submit" name="submitAdd" value="Submit" /> &nbsp;
			<input class="btn" type='submit' name="back" id="back" value="Back" onClick="history.back(); return false;" />
		</form>
	</div>

</div>

<?php include "footer.php"; ?>