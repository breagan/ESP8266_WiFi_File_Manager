<body bgcolor='#E6E6E6'>
<pre>
<?php
$chipIP = $_POST['chipIP'];
$fp = fsockopen($chipIP, 80, $errno, $errstr, 10);
	$out = "**command**restart**";
	fwrite($fp, $out);
	fclose($fp);
	flush($fp);
  echo "<B>node.restart() command sent to $chipIP";
  echo "<br>Redirect in 5 seconds time for ESP to reboot.";
  echo "<META http-equiv='refresh' content='5;URL=.'>";
?>

