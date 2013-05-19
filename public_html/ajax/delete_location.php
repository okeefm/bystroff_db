<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$query = "";
	switch ($_POST["selectId"]) {
		case "locations":
			$query = "DELETE FROM locations WHERE id=?;";
			break;
		case "sublocations":
			$query = "DELETE FROM sublocations WHERE id=?;";
			break;
		case "boxes":
			$query = "DELETE FROM boxes WHERE id=?;";
			break;
		case "owners":
			$query = "DELETE FROM owners WHERE id=?;";
			break;
		default:
			die("Not a selectId name");
	}
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("d", $_POST["id"]);
	if ($stmt->execute()) {
		echo "success";
	} else {
		echo "failure";
	}
	$mysqli->close();
?>
