<?php
	include "header.php";
	
	$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
	$stmt = $mysqli->prepare("INSERT INTO samples (Name_of_Sample, Location, Sublocation, Box, Owner, Date, Type, Gi_number, Sequence, Comments, Concentration, Amount, Purity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("sddddsdssssss", $_POST["sampleName"], $_POST['locations'], $_POST['sublocations'], 
	$_POST['boxes'], $_POST['owners'],$_POST['sampleDate'], $_POST['type'], $_POST['gi_number'], $_POST['sequence'],$_POST['comments'], 
	$_POST['concentration'], $_POST['amount'], $_POST['purity']);
	
	if($stmt->execute()) {
		echo "Sample successfully added <br />\n";
	} else {
		echo "Sample add failed! <br />\n";
	}
	$mysqli->close();
	
	$data = file_get_contents($db['solr']."?command=delta-import");
	
	include "footer.php";
?>
