<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$query = "";
	switch ($_POST["selectId"]) {
		case "locations":
			$query = "INSERT INTO locations (value) VALUES (?);";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $_POST["value"]);
			break;
		case "sublocations":
			$query = "INSERT INTO sublocations (value, location) VALUES (?, ?);";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("sd", $_POST["value"], $_POST["location"]);
			break;
		case "boxes":
			$query = "INSERT INTO boxes (value, location, sublocation) VALUES (?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("sdd", $_POST["value"], $_POST["location"], $_POST["sublocation"]);
			break;
		case "owners":
			$query = "INSERT INTO owners (name) VALUES (?);";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $_POST["value"]);
			break;
		case "types":
			$query = "INSERT INTO types (value) VALUES (?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $_POST["value"]);
			break;
		default:
			die("Not a selectId name");
	}
	if ($stmt->execute()) {
		echo "success";
	} else {
		echo "failure";
	}
	$mysqli->close();
?>
