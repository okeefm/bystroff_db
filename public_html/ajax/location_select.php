<option value="" disabled selected>Select:</option>
<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$query = "";
	switch ($_POST["next"]) {
		case "sublocations":
			$query = "SELECT id, value FROM sublocations WHERE location = ?;";
			break;
		case "boxes":
			$query = "SELECT id, value FROM boxes WHERE sublocation = ?;";
			break;
		default:
			die("Not a next name");
	}
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("d", $_POST["id"]);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	while ($row != null) {
		echo "<option value='".$row['id']."'>".$row['value']."</option>\n";
		$row = $res->fetch_assoc();
	}
	$mysqli->close();
?>