<body bgcolor='#E6E6E6'>
<pre>
<?php
$filename = $_POST['filename'];
$chipIP = $_POST['IP'];
echo $filename."<BR>".$chipIP;
echo "<BR>";
$fp = fsockopen($chipIP, 80, $errno, $errstr, 10);
	$out = "**command**dofile **\n".$filename;
	fwrite($fp, $out);
	fclose($fp);
	flush($fp);
if($errno == 0)
	{
		echo "<B>dofile($filename) sent!";
		echo "<META http-equiv='refresh' content='2;URL=.'>";
	}
else
	{
		echo "Error,  # $errno";
		echo "<META http-equiv='refresh' content='2;URL=.'>";
	}
?>

