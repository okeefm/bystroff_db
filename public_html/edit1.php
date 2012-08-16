<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
		</head>
		<body>
<?php
	$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
{
	die('Could not connect: ' . mysql_error() );
}
mysql_select_db("proteins", $con);
for ($del = 0;$del < sizeof($_POST["Type"]);$del++) {
$query = "DELETE FROM samples WHERE ID = '" . $_POST['del'][$del] . "';";
if ($_POST['del'][$del]!='')
echo "Deleted " . $_POST['del'][$del] . "<br>";
mysql_query($query);
}

$ind1 = 0;
for ( $ind = 1; $ind < 3*sizeof($_POST["Type"]); $ind=$ind+3 ) {
	$_POST["Date"][$ind1] = $_POST["datepicker" . $ind];
$ind1++;
}
$result = mysql_query("SELECT * from samples");
for   ($row = 1; $row < mysql_num_fields($result);$row++ ) {
	$property = mysql_fetch_field($result, $row);
	$index = 0;
	while ($index < sizeof($_POST["Type"])) {
		$sql = "UPDATE samples SET " . $property->name . "='" .  $_POST[$property->name][$index] . "' WHERE ID = '" . $_POST["ID"][$index] . "';";
	mysql_query($sql);
		$index++;
	}
}
mysql_close($con);
?>
<a href="http://bach1.bio.rpi.edu/tivinj/index1.php">Go to home page</a>

	</body>
	</html>
