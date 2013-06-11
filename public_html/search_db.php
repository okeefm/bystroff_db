<?php
	include "header.php";
	include "assets/php/bootstrap.php";
	
	// Set the default timezone to use. Available as of PHP 5.1
	date_default_timezone_set('UTC');
	
	//var_dump($_POST);

	$instance_KoSolr = KoSolr::getInstance();
	$KoSolr_Server_Instance = $instance_KoSolr->getServer();
	
	$search_request = $KoSolr_Server_Instance->create_search_request();
	$search_request->select('*');
	
	if(isset($_POST['text']) && (strlen($_POST['text']) > 0)) {
		$search_request->equals('text', "'".$_POST['text']."'");
	}
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
		$date_timestamp = strtotime($_POST['sampleDate']);
		$date = date("Y-m-d\TH\\\\:i\\\\:s\Z", $date_timestamp);
		$search_request->equals('date', $date);
	}
	if (isset($_POST['sequence']) && (strlen($_POST['sequence']) > 0)) {
		$search_request->equals('sequence', $_POST['sequence']);
	}
	
	$response = $KoSolr_Server_Instance->execute($search_request);
	
	echo "<table class='table table-bordered' id='results'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sample Name</th>
                    <th>Type</th>
                    <th>Room</th>
                    <th>Location</th>
                    <th>Box</th>
                    <th>Date</th>
                    <th>Owner</th>
                    <th>Concentration</th>
                    <th>Volume</th>
                    <th>GI Number</th>
                    <th>Comments</th>
                    <th>Sequence</th>
					<th>Actions</th>
                </tr>
            </thead>";
			
	$i = 0;
	foreach($response->response['docs'] as $result) {
		echo "<tr class='tableRow'> \n";
		echo "<td>".(++$i)."</td>";
		
		if (isset($result["Name_of_Sample"])) {
			echo "<td>".$result["Name_of_Sample"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["type"])) {
			echo "<td>".$result["type"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["location"])) {
			echo "<td>".$result["location"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["sublocation"])) {
			echo "<td>".$result["sublocation"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["box"])) {
			echo "<td>".$result["box"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["date"])) {
			echo "<td>".date("Y-m-d", strtotime($result["date"]))."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["owner"])) {
			echo "<td>".$result["owner"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["concentration"])) {
			echo "<td>".$result["concentration"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["volume"])) {
			echo "<td>".$result["volume"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["gi_number"])) {
			echo "<td>".$result["gi_number"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["comments"])) {
			echo "<td>".$result["comments"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		if (isset($result["sequence"])) {
			echo "<td>".$result["sequence"]."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		echo "<td>
			<a class='btn edit' href='' data-id='".$result['id']."'>Edit</a> <br />
			<a class='btn delete' href='' data-id='".$result['id']."'>Delete</a>
		</td>\n</tr>\n";
	}
	unset($result);
	
	echo "<tfoot>
                <tr>
                    <th>#</th>
                    <th>Sample Name</th>
                    <th>Type</th>
                    <th>Room</th>
                    <th>Location</th>
                    <th>Box</th>
                    <th>Date</th>
                    <th>Owner</th>
                    <th>Concentration</th>
                    <th>Volume</th>
                    <th>GI Number</th>
                    <th>Comments</th>
                    <th>Sequence</th>
					<th>Actions</th>
                </tr>
            </tfoot>";
			
	include "footer.php";
?>

<script src="assets/js/search_db.js"></script>
