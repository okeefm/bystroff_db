<?php
	include "header.php";
	include "assets/php/bootstrap.php";
	
	// Set the default timezone to use. Available as of PHP 5.1
	date_default_timezone_set('UTC');
	
	//var_dump($_REQUEST);

	$instance_KoSolr = KoSolr::getInstance();
	$KoSolr_Server_Instance = $instance_KoSolr->getServer();
	
	$search_request = $KoSolr_Server_Instance->create_search_request();
	$search_request->select('*');
	
	if(isset($_REQUEST['text']) && (strlen($_REQUEST['text']) > 0)) {
		$search_request->equals('text', "'".$_REQUEST['text']."'");
	}
	if(isset($_REQUEST['sampleName']) && (strlen($_REQUEST['sampleName']) > 0)) {
		$search_request->equals('Name_of_Sample', $_REQUEST['sampleName']);
	}
	if (isset($_REQUEST['locations'])){ 
		$search_request->equals('location_id', $_REQUEST['locations']);
	}
	if (isset($_REQUEST['sublocations'])){ 
		$search_request->equals('sublocation_id', $_REQUEST['sublocations']);
	}
	if (isset($_REQUEST['boxes'])){ 
		$search_request->equals('box_id', $_REQUEST['boxes']);
	}
	if (isset($_REQUEST['owners'])){ 
		$search_request->equals('owner_id', $_REQUEST['owners']);
	}
	if (isset($_REQUEST['type'])){ 
		$search_request->equals('type_id', $_REQUEST['type']);
	}
	if (isset($_REQUEST['sampleDate']) && (strlen($_REQUEST['sampleDate']) > 0)) {
		$date_timestamp = strtotime($_REQUEST['sampleDate']);
		$date = date("Y-m-d\TH\\\\:i\\\\:s\Z", $date_timestamp);
		$search_request->equals('date', $date);
	}
	if (isset($_REQUEST['sequence']) && (strlen($_REQUEST['sequence']) > 0)) {
		$search_request->equals('sequence', $_REQUEST['sequence']);
	}
	if (isset($_REQUEST['gi_number']) && (strlen($_REQUEST['gi_number']) > 0)) {
		$search_request->equals('gi_number', $_REQUEST['gi_number']);
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
                    <th>Amount</th>
                    <th>GI Number</th>
                    <th>Comments</th>
                    <th>Sequence</th>
					<th>Last Updated</th>
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
		
		if (isset($result["amount"])) {
			echo "<td>".$result["amount"]."</td>\n";
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
		
		if (isset($result["last_update"])) {
			echo "<td>".date("Y-m-d H:i:s", strtotime($result["last_update"]))."</td>\n";
		} else {
			echo "<td> </td>\n";
		}
		
		echo "<td>
			<a class='btn edit' href='edit_sample.php?id=".$result['id']."' >Edit</a> <br />
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
                    <th>Amount</th>
                    <th>GI Number</th>
                    <th>Comments</th>
                    <th>Sequence</th>
					<th>Last updated</th>
					<th>Actions</th>
                </tr>
            </tfoot>";
			
	include "footer.php";
?>

<script src="assets/js/search_db.js"></script>
