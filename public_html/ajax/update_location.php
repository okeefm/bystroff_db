<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$query = "";
	switch ($_POST["selectId"]) {
		case "locations":
			$query = "UPDATE locations SET value=? WHERE id=?;";
			break;
		case "sublocations":
			$query = "UPDATE sublocations SET value=? WHERE id=?;";
			break;
		case "boxes":
			$query = "UPDATE boxes SET value=? WHERE id=?;";
			break;
		default:
			die("Not a selectId name");
	}
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("sd", $_POST["value"], $_POST["id"]);
	if ($stmt->execute()) {
		echo "success";
	} else {
		echo "failure";
	}
?>
