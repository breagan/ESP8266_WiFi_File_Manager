<body bgcolor='#E6E6E6'>
<pre>
<?php
$filename = $_POST['filename'];    // gets file name and target IP from index
$chipIP = $_POST['chipIP'];
echo "<BR>";
$filename = "filebin/$filename";  //adds filebin/ for file IO
$out = file($filename);           // reads file into Array $out   
$filelines = count($out);			//  Number of lines in array
$header = "newfile";				//newfile indicates this is first part of file string.
echo "<BR>";
$filesize = 0;						//rests vars
$x=0; 
$header = "**command**Newfile**\n";   //  headeer defaults to this  changed if looped to more data
$filenametoESP = substr($filename,8,20)."\n";      // strips filebin
$datatoESP = "";
	echo "<B>";
	echo trim($filenametoESP);
	echo " Sent to ESP.</B>";
	echo "<BR><BR>";
	echo "************************ Start File *********************************";
	echo "<BR><BR><B>";

foreach ($out as $t)
	{
		$filesize = $filesize + strlen($t);    // cumulative string size to trigger a break
		if($t == "\n") {$t = "  ";}				//  removes blank lines
		$datatoESP = $datatoESP.$t;             // builds file string
		$x++;
			if ($filesize > 1200)
				{
					sendtoESP($datatoESP,$header,$filenametoESP,$chipIP);     //  sends data to functon sentoESP resets filesize
					$filesize = 0;
					$datatoESP = "";
					$header = "**command**Apdfile**\n";                         // header now changed to append
				}
			if ($x == $filelines)												// stops the new file or apdfile at last element of array
				{
					if($datatoESP)
						{
			  			  sendtoESP($datatoESP,$header,$filenametoESP,$chipIP);
						}
				}
	}

echo "<BR>";
	echo "<BR>";
	echo "<BR>";
	echo "************************  End File  *********************************";
	echo "<BR>";
	echo "<BR>";	
	echo "<B>$filenametoESP Sent to ESP!";
	echo "<META http-equiv='refresh' content='2;URL=.'>";

function sendtoESP($datatoESP,$header,$filenametoESP,$chipIP)
{
	$fp = fsockopen($chipIP, 80, $errno, $errstr, 10);
		$out = $header.$filenametoESP.trim($datatoESP);
		echo trim($datatoESP);
		fwrite($fp, $out);
		fclose($fp);
		flush($fp); 
}

?>

