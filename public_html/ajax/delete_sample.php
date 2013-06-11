<?php
	$db = parse_ini_file("../config/db.ini");
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$stmt = $mysqli->prepare("DELETE FROM samples WHERE id = ?");
	$stmt->bind_param("d", $_POST["id"]);
	if ($stmt->execute()) {
		include "../assets/php/bootstrap.php";
	
		$instance_KoSolr = KoSolr::getInstance();
		$KoSolr_Server_Instance = $instance_KoSolr->getServer();
		
		$KoSolr_Server_Instance->execute($KoSolr_Server_Instance->create_delete_request("id:".$_POST['id']));
		$KoSolr_Server_Instance->commit();
		
		echo "success";
	} else {
		echo "failure";
	}
	$mysqli->close();
	
?>