<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta charset="utf-8">
	<title>Database server</title>
	<link rel="stylesheet" href="themes/base/jquery.ui.all.css">
	<script src="jquery-1.7.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
	<style type="text/css">
	th {text-align:left;}
</style>

	<script type="text/javascript">
	function displayResult()
{
	var x=document.getElementById("Mtype").selectedIndex;
	var y=document.getElementById("Mtype").options;
	var i = 0;
	var j =0;
	for (j=0;j<document.getElementsByName("DNA").length;j++) {
		var m = document.getElementsByName("DNA")[j];
		m.style.display= "none";
	}
	for (j=0;j<document.getElementsByName("Cell").length;j++) {
		var m = document.getElementsByName("Cell")[j];
 m.style.display= "none";
}
	for (j=0;j<document.getElementsByName("Protein").length;j++) {
		var m = document.getElementsByName("Protein")[j];
 m.style.display= "none";
}
	for (i=0;i < document.getElementsByTagName("tr").length;i++) {
		var m = document.getElementsByName(y[x].text)[i];
 m.style.display= "table-row";
}
}
</script>
	<script type="text/javascript">
	function clearForms()
{
	var i;
	for (i=0;(i<document.forms.length); i++) {
		document.forms[i].reset();
	}
}
</script>
	</head>
	<body onload="clearForms()" onUnload="clearForms()">
   <h1>Bystroff Lab Database</h1><br>
<h2>Select from menus or type in a search string</h2>
<br>
	<form name = "inputfields" action="insert1.php" method="post">
	<?php
	$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("proteins", $con);
$result = mysql_query("SELECT * from samples");
echo "<table border='0'>";

for   ($row = 1; $row < mysql_num_fields($result);$row++ ) {
	$property = mysql_fetch_field($result, $row);
	if  (substr($property->name, 0, 7) == "Protein")
		echo '<tr name="Protein" visibility:hidden >';
	if (substr($property->name, 0, 3) =="DNA")
		echo '<tr name="DNA" visibility:hidden>';
	if (substr($property->name, 0, 4) == "Cell")
		echo '<tr name="Cell" visibility:hidden >';

	else if (substr($property->name, 0, 7) != "Protein"&&substr($property->name, 0, 3) !="DNA"&&substr($property->name, 0, 4) != "Cell")  
		echo '<tr>';
	echo '<th>' . $property->name . '</th>';
	echo "<td>";
	if ($property->type == 'int') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 50; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		echo '</select>';
	}
	else	if ($property->type == 'real') {
		echo '<input type="text" name="' . $property->name . '[]" />';
	}
	else if ($property->name=='row'||$property->name=='col') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 50; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		for ($char = 65; $char < 91; $char++)
			echo '<option>&#0' . $char . '</option>';

		for ($char1 = 65; $char1 < 91; $char1++) {
			for ($char2 = 65; $char2 < 91; $char2++) {
				echo '<option>&#0' . $char1 . '&#0' . $char2 . '</option>';
			}
		}
		echo '<input type="text" name="' . $property->name . '[]" />';

		echo '</select>';
	}	
	else    if ($property->type == 'int') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 50; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		echo '</select>';
	}
	else	if ($property->name=='Date') {
		echo "Enter date: ";
		echo '<input type="text" name="' . $property->name . '[]" id="datepicker" size="12" autocomplete="off" />';
	}
	else	if ($property->name=="Type") {
		echo '<select onchange="displayResult()" ID="Mtype" name="Type[]" >';
		echo '<option value = ""></option>';	
		echo '<option value = "Cell">Cell</option>';
		echo '<option value = "Protein">Protein</option>';
		echo '<option value = "DNA">DNA</option>';
		echo '</select>';
	} 
	else	 if ($property->type == 'string'&&$property->name!=type) {
		if    (mysql_field_len($result, $row)>=100)
			echo '<textarea name="' . $property->name . '[]" rows="2" cols="20"></textarea>';	
		else {
			echo '<input type="text" name="' . $property->name . '[]" />';
			$dropdown = mysql_query('SELECT DISTINCT ' . $property->name . ' FROM samples');
			echo '<select name="' . $property->name . '[]">';
			echo '<option value = ""></option>';
			while ($drop = mysql_fetch_array($dropdown))
				if ($drop[$property->name]!="")
					echo '<option value="' . $drop[$property->name] . '">' . $drop[$property->name] . '</option>';
			echo '</select>';
		}
	} 
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo '<input type="submit" name="input" value="Add new" />';
echo '<input type="submit" name="input" value="Search" />';

echo "</form><br>";
mysql_close($con);
?>
	<hr />

	<form action="query1.php" method="post">
	<input type="submit" value="Display all data in the database" />
	</form>
	<br>

	<form action="get1.php" method="get">
	Query type: 
<?php
	$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("proteins", $con);
$result = mysql_query("SELECT * from samples");
echo '<select name="qfield">';
for   ($row = 0; $row < mysql_num_fields($result);$row++ ) {
	$property = mysql_fetch_field($result, $row);
	echo '<option value="' . $property->name . '">' . $property->name . '</option>';

}
mysql_close($con);
?>
	</select>
	<input type="text" name="qname" />
	<input type="submit" />
	</form>
	<br>

	<form action="edit.php" method="get">
	Edit Samples where
	<?php
	$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("proteins", $con);
$result = mysql_query("SELECT * from samples");
echo '<select name="qfield">';
for   ($row = 0; $row < mysql_num_fields($result);$row++ ) {
	$property = mysql_fetch_field($result, $row);
	echo '<option value="' . $property->name . '">' . $property->name . '</option>';

}
mysql_close($con);
?>
	</select>
	= <input type="text" name="qname" />
	<input type="submit" />
	</form>
	<br>
	<form action="addcolumn.php" method="post">
	Add column: <input type="text" name="dname" />
Type: <select name="type">
	  <option value="Text">Text</option>
	  <option value="Int">Integer</option>
	  <option value="decimal">Decimal</option>
	  </select> 
	  <input type="submit" />
	  </form>
	  <br>
	  </body>
	  </html>
