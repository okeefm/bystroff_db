<?php
	include('assets/php/bootstrap.php');
	// Set the default timezone to use. Available as of PHP 5.1
	date_default_timezone_set('UTC');
	
	var_dump($_POST);
	
	echo("<br /> <br />");
	
	$instance_KoSolr = KoSolr::getInstance();
	$KoSolr_Server_Instance = $instance_KoSolr->getServer();
	
	$search_request = $KoSolr_Server_Instance->create_search_request();
	$search_request->select('*');
	
	if(isset($_POST['sampleName']) && (strlen($_POST['sampleName']) > 0)) {
		$search_request->equals('Name_of_Sample', $_POST['sampleName']);
	}
	if (isset($_POST['locations'])){ 
		$search_request->equals('location_id', $_POST['locations']);
	}
	if (isset($_POST['sublocations'])){ 
		$search_request->equals('sublocation_id', $_POST['sublocations']);
	}
	if (isset($_POST['boxes'])){ 
		$search_request->equals('box_id', $_POST['boxes']);
	}
	if (isset($_POST['owners'])){ 
		$search_request->equals('owner_id', $_POST['owners']);
	}
	if (isset($_POST['type'])){ 
		$search_request->equals('type_id', $_POST['type']);
	}
	if (isset($_POST['sampleDate']) && (strlen($_POST['sampleDate']) > 0)) {
		$segments = preg_split("/\//", $_POST['sampleDate']);
		$date_timestamp = mktime(0,0,0, $segments[0], $segments[1], $segments[2]);
		$date = date("Y-m-d\TH\\\\:i\\\\:s\Z", $date_timestamp);
		//$date = "1995-12-31T23\:59\:59Z";
		echo $date;
		$search_request->equals('date', $date);
	}
	
	$response = $KoSolr_Server_Instance->execute($search_request);
	
	var_dump($response);
?>