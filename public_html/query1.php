<?php
$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("proteins", $con);
$result = mysql_query("SELECT * from samples");
echo "<table border='1'>";
echo "<tr>";
        for   ($row = 0; $row < mysql_num_fields($result);$row++ ) {
                $property = mysql_fetch_field($result, $row);
                echo "<th>" . $property->name . "</th>";
                }
echo "</tr>";
$result = mysql_query("SELECT * FROM samples");
	while($row = mysql_fetch_array($result))
		{
		echo "<tr>";
			for   ($col = 0; $col < mysql_num_fields($result);$col++ ) {
 				 echo "<td>" . $row[$col] . "</td>";
					}
 				 echo "</tr>";
 				 }
echo "</table>";
mysql_close($con);
?>

