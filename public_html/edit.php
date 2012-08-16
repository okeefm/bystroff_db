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
	<script type='text/javascript'>
	function displayResult(C , D)
{
	document.write("<img src='http://chart.apis.google.com/chart?cht=qr&chs=230x230&chl=http://bach1.bio.rpi.edu/tivinj/edit.php?qfield=" + C + "%26qname=" + D + "' />");
	document.write("<br>");
	document.write("<h1>" + C + " : " + D);
	document.write("<br>");
	document.write("<br>");
	document.write("<button onclick='document.location.reload()'>Go back</button>");
	document.write("<br>");
}
function displayResult3(C , D)
{
	document.write("<img src='http://chart.apis.google.com/chart?cht=qr&chs=150x150&chl=http://bach1.bio.rpi.edu/tivinj/edit.php?qfield=" + C + "%26qname=" + D + "' />");
	document.write("<br>");
	document.write("<h1>" + C + " : " + D);
	document.write("<br>");
	document.write("<br>");
	document.write("<button onclick='document.location.reload()'>Go back</button>");
	document.write("<br>");
}
function displayResult2(C,D)
{
	document.write("<img src='http://chart.apis.google.com/chart?cht=qr&chs=100x100&chl=http://bach1.bio.rpi.edu/tivinj/edit.php?qfield=" + C + "%26qname=" + D + "' />");
	document.write("<br>");
	document.write("<h1>" + C + " : " + D);
	document.write("<br>");
	document.write("<br>");
	document.write("<button onclick='document.location.reload()'>Go back</button>");
	document.write("<br>");
}
function newvalue(myselect, anchor)
{
	var x=document.getElementById(myselect).selectedIndex;
	var y=document.getElementById(myselect).options;
	if (x == 1) {
		var name=prompt("Please enter the new value");
		if (name!=null && name!="")
		{
			document.getElementById(anchor).innerHTML= name;
			var node=document.createElement("option");
			node.setAttribute("id", anchor);

			var textnode=document.createTextNode("--New Item--");

			node.appendChild(textnode);

			document.getElementById(myselect).insertBefore(node, y[1]);
		}
	}
}
</script>
	<?php
	$con = mysql_connect("localhost","root","iloveproteins");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("proteins", $con);
$sql = "SELECT * from samples WHERE "  . $_GET[qfield]  . " LIKE '%" . $_GET[qname] . "%';";
$result = mysql_query($sql);
echo   '<script>$(function() { $( "#datepicker0" ).datepicker({ dateFormat: "yy-mm-dd" }); ';
for ($index=1;$index<3*mysql_num_rows($result);$index=$index+3) {
	echo '$( "#datepicker' . $index . '").datepicker({ dateFormat: "yy-mm-dd" }); ';
}
echo '$( "#datepickernew' . $index . '").datepicker({ dateFormat: "yy-mm-dd" }); ';
echo "});</script>";
echo '<script type="text/javascript">
	function clearForms()
{
	var i;
	for (i=0;(i<document.forms.length); i++) {
		document.forms[i].reset();
	}
}
</script>';
	echo "</head>";
echo "<body onUnload = 'clearForms()' onload = 'clearForms()'>";
echo "<table border='1'>";
echo "<form action='edit1.php' method='post'>";
echo "<tr>";
echo "<th class='delete' >Delete</th>";
for   ($row = 0; $row < mysql_num_fields($result);$row++ ) {
	$property = mysql_fetch_field($result, $row);
	echo "<th class='" . $property->name . "' >" . $property->name . "</th>";
}
echo "</tr>";

$result =  mysql_query($sql );
$datevar = 1;
$anchor = 2;
$select = 3;
while($row = mysql_fetch_array($result))
{
 echo "<tr><td><input type='checkbox' name='del[]' value='" . $row[0] . "' /></td>";
	for   ($col = 0; $col < mysql_num_fields($result);$col++ ) {
		$property = mysql_fetch_field($result, $col);
		if ($property->name == 'ID')
			echo   "<td><input autocomplete='off' readonly='readonly' name = '" . $property->name . "[]'  value='" . $row[$col] . "' type= 'text' /></td>";
        else if ($property->name=='row'||$property->name=='col') {
                echo '<td><select name="' . $property->name . '[]">';
               echo '<option>' . $row[$col] . '</option>';
		 echo '<option value = ""></option>';
	
		for ($num = 0; $num < 20; $num++)
                        echo '<option value="' . $num . '">' . $num . '</option>';
                for ($char = 65; $char < 75; $char++)
                        echo '<option>&#0' . $char . '</option>';

                for ($char1 = 65; $char1 < 75; $char1++) {
                        for ($char2 = 65; $char2 < 75; $char2++) {
                                echo '<option>&#0' . $char1 . '&#0' . $char2 . '</option>';
                        }
                }
                echo '</select></td>';
        }



		else if ($property->type == 'int') {
			echo '<td><select name="' . $property->name . '[]">';
			echo '<option selected="selected" >' . $row[$col] . '</option>';
			for ($num = 0; $num < 99; $num++)
				echo '<option>' . $num . '</option>';
			echo '</select></td>';
		}
		else    if ($property->type == 'real') {
			echo "<td><input autocomplete='off' name = '" . $property->name . "[]'  value='" . $row[$col] . "' type= 'text' /></td>";
		}
		else    if ($property->name=='Date') {
			echo '<td><input autocomplete="off" value="' . $row[$col] . '" id = "datepicker' . $datevar . '" name = "datepicker' . $datevar . '" type= "text" /></td>';
		}
		else    if ($property->name=="Type") {
			echo '<td><select name="Type[]" >';
			echo '<option selected="selected" value = "' . $row[$col] . '">' . $row[$col] . '</option>';
			echo '<option value = ""></option>';
			echo '<option value = "Cell">Cell</option>';
			echo '<option value = "Protein">Protein</option>';
			echo '<option value = "DNA">DNA</option>';
			echo '</select></td>';
		}
		else     if ($property->type == 'string') {
			if    (mysql_field_len($result, $col)>=100)
				echo "<td><textarea name = '" . $property->name . "[]' autocomplete='off' rows='4' cols='20' >" . $row[$col] . "</textarea></td>";
			else {
				echo "<td>";
				$dropdown = mysql_query('SELECT DISTINCT ' . $property->name . ' FROM samples');
				echo '<select id="' . $select . '" onchange = "newvalue(' . $select . ', ' . $anchor . ' )" name="' . $property->name . '[]">';
				echo '<option>' . $row[$col] . '</option>';
				echo '<option id = ' . $anchor . '>--New Value input--</option>';
				while ($drop = mysql_fetch_array($dropdown))
					if ($drop[$property->name]!="")
						echo '<option>' . $drop[$property->name] . '</option>';
				echo '</select></td>';
			}
		}

		$anchor+=3;
		$select+=3;
	}
	$datevar+=3;
}
echo "</tr>";
echo "<tr><td><input type = 'submit'></td></tr>";
echo "</form>";
echo "<tr><td>blank space here</td></tr>";


$result = mysql_query($sql);



echo "<tr><form action='insert1.php' method='post'>";
echo "<td>New</td><td></td>";
for   ($row = 1; $row < mysql_num_fields($result);$row++ ) {
	echo "<td>";
	$result =  mysql_query( $sql );
	$property = mysql_fetch_field($result, $row);
	if ($property->type == 'int') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 50; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		echo '</select></td>';
	}
	else    if ($property->type == 'real') {
		echo '<input type="text" name="' . $property->name . '[]" /></td>';
	}
	else if ($property->name=='row'||$property->name=='col') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 20; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		for ($char = 65; $char < 75; $char++)
			echo '<option>&#0' . $char . '</option>';

		for ($char1 = 65; $char1 < 75; $char1++) {
			for ($char2 = 65; $char2 < 75; $char2++) {
				echo '<option>&#0' . $char1 . '&#0' . $char2 . '</option>';
			}
		}
		echo '</select></td>';
	}
	else    if ($property->type == 'int') {
		echo '<select name="' . $property->name . '[]">';
		echo '<option value = ""></option>';
		for ($num = 0; $num < 50; $num++)
			echo '<option value="' . $num . '">' . $num . '</option>';
		echo '</select></td>';
	}

	else    if ($property->name=='Date') {
		echo '<input type="text" name="' . $property->name . '[]" id="datepickernew" size="12" autocomplete="off" /></td>';
	}
	else    if ($property->name=="Type") {
		echo '<select ID="Mtype" name="Type[]" >';
		echo '<option value = ""></option>';
		echo '<option value = "Cell">Cell</option>';
		echo '<option value = "Protein">Protein</option>';
		echo '<option value = "DNA">DNA</option>';
		echo '</select></td>';
	}
	else     if ($property->type == 'string'&&$property->name!=type) {
		if    (mysql_field_len($result, $row)>=100)
			echo '<textarea name="' . $property->name . '[]" rows="2" cols="20"></textarea></td>';
		else {

			$dropdown = mysql_query('SELECT DISTINCT ' . $property->name . ' FROM samples');
			 echo '<input type="text" name="' . $property->name . '[]" />';
			echo '<select name="' . $property->name . '[]">';
			echo '<option value = ""></option>';
			while ($drop = mysql_fetch_array($dropdown))
				if ($drop[$property->name]!="")
					echo '<option value="' . $drop[$property->name] . '">' . $drop[$property->name] . '</option>';
			echo '</select></td>';
		}
	}
}
echo "<tr><td><input type = 'submit'></td></tr></form>";
echo "</table>";
echo "<br>";
$link1 =   $_GET[qfield];
$link2 = $_GET[qname];
$link2 = str_replace(" ", "+", $link2);
echo "<button onclick = displayResult('" . $link1 . "','" .  $link2 . "')>Click for QR Code (Large)</button>";
echo "<button onclick = displayResult3('" . $link1 . "','" .  $link2 . "')>Click for QR Code (Medium)</button>";
echo "<button onclick = displayResult2('" . $link1 . "','" .  $link2 . "')>Click for QR Code (Small)</button>";
mysql_close($con);
?>
<br>
<a href="http://bach1.bio.rpi.edu/tivinj/index1.php">Go to home page</a>
	</body>
	</html>
