<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$stmt = $mysqli->prepare("DELETE FROM samples WHERE id = ?");
	$stmt->bind_param("d", $_POST["id"]);
	if ($stmt->execute()) {
		echo "success";
	} else {
		echo "failure";
	}
	$mysqli->close();
	
?>