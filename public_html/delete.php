<?php
$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("proteins", $con);
$query = "DELETE FROM samples WHERE Name_of_Sample = '" . $_POST[dname] . "';";
echo "Deleted " . $_POST[dname];
mysql_query($query);
mysql_close($con);
Header( "Location: http://bach1.bio.rpi.edu/tivinj/index1.php"  );

?>
