<?php
$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("proteins", $con);
if ($_POST[type] == "Text")
$type = "VARCHAR (1000)"; 
if ($_POST[type] == "Int")
$type = "INT(50)";
if ($_POST[type] == "decimal")
$type = "Real(25, 10)";


$query = "Alter table samples add column " . $_POST[dname] . " " . $type . ";" ; 

mysql_query($query);
mysql_error();
mysql_close($con);
Header( "Location: http://bach1.bio.rpi.edu/tivinj/index1.php"  );

?>
