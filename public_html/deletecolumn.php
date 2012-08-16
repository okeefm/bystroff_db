<html>
<?php
echo "<head><script type='text/javascript'>function display_alert()  {  alert('" . $_POST[dname] . " WILL BE DELETED!');  }  </script></head>";
echo "<body onLoad = display_alert() >";

$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("proteins", $con);

$query = "Alter table samples drop column " . $_POST[dname] . ";";
mysql_query($query);
mysql_close($con);
Header( "Location: http://bach1.bio.rpi.edu/tivinj/index1.php"  );

?>
</body>
</html>
