<body bgcolor='#E6E6E6'>
<pre>
<?php
$filename = $_POST['filename'];
$chipIP = $_POST['IP'];
echo $filename."<BR>".$chipIP;
echo "<BR>";
$fp = fsockopen($chipIP, 80, $errno, $errstr, 10);
	$out = "**command**delfile**\n".$filename;
	fwrite($fp, $out);
	fclose($fp);
	flush($fp);
if($errno == 0)
	{
		echo "<B>$filename deleted!";
		echo "<META http-equiv='refresh' content='2;URL=.'>";
	}
else
	{
		echo "Error, $filename may not be deleted!  Error # $errno";
		echo "<META http-equiv='refresh' content='2;URL=.'>";
	}
?>

