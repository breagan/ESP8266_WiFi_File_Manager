<html>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN'>
<head>
<title>WiFi ESP8266 Manager</title>
</head>
<body bgcolor='#E6E6E6'>
<h2><center>WiFi ESP8266 Manager</h2>
<pre><p>
<table border="0" bgcolor='#f0f0f0' cellpadding = "5" align = "center" width = "500">
<tr>
<td>
<?php
echo "<center>";

$chipdata = file("controllerIP.txt");   // reads IP number for ESP
$chipIP = $chipdata[0];
$uploadfiles = scandir("./filebin");    // reads the /filebin dir and puts all files in an array.
echo "<form action='writeIP.php' method='post'>";   // writes updated IP
echo "Target Controller IP: <input type='text' name='chipIP' value='$chipIP' size='11'>&nbsp;";
echo "<input type='submit' value='Update'>";
echo "</form>";
echo "<BR>";

echo "<center>";
echo "<form method='LINK' ACTION='http://".$chipIP."'>";   // simple link to target ESP to get status
echo "<input type='submit' value='Controller Status'>";
echo "</form>";

echo "<form method='POST' ACTION='send_Restart.php'>";
echo "<input type='hidden' name='chipIP' value=$chipIP>";
echo "<input type='submit' value='   ReBoot ESP   '>";
echo "</form>";

echo "<BR>";
echo "<table border='1' bgcolor='#f8f8f8' cellpadding = '4' align = 'center' width = '350'>";
echo "<TR><TD>";
echo "<B><center>Files in '/filebin' available for upload:</B><BR><BR>";
echo "<BR>";
foreach($uploadfiles as $t)             // iterates through array to list files availabe to be uploaded
	{
		if($t != "." && $t != "..")
			{
				echo "<form method='POST' ACTION='send_File.php'>";
				echo "<input type='hidden' name='chipIP' value=$chipIP>";
				echo "<input type='hidden' name='filename' value=$t>";
				echo "<input type='submit' value='  $t  '>";
				echo "</form>";
			}
	}
echo "</td></tr></table>";
echo "<BR><BR>";
echo "<table border='0' cellpadding = '2' align = 'center' width = '450'>";
echo "<tr>";

echo "<form action='send_Delfile.php' method='post'>";
echo "<td align = 'right'>File to file.remove(): </td><td align = 'center'><input type='text' name='filename' value=''>&nbsp;</td>";
echo "<td><input type='submit' value='Delete  '></td>";
echo "<input type='hidden' name='IP' value=$chipIP>";
echo "</form>";
echo "</tr>";
echo "<tr>";

echo "<form action='send_Dofile.php' method='post'>";
echo "<td align = 'right'>File to dofile(): </td><td align = 'center'><input type='text' name='filename' value=''>&nbsp;</td>";
echo "<td><input type='submit' value=' Dofile  '></td>";
echo "<input type='hidden' name='IP' value=$chipIP>";
echo "</form>";
echo "</tr>";

echo "<tr>";
echo "<form action='send_Compile.php' method='post'>";
echo "<td align = 'right'>File to node.compile():</td><td align = 'center'> <input type='text' name='filename' value=''>&nbsp;</td>";
echo "<td><input type='submit' value='Compile'></td>";
echo "<input type='hidden' name='IP' value=$chipIP>";
echo "</form>";
echo "</tr>";

echo "</table>";

?>
</td>
</tr>
</table>
<center> <font color = "#b0b0b0"> Bruce Reagan &copy; 2015

</html>
