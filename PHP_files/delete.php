<body bgcolor='#E6E6E6'>
<?php	
/*$_POST['IP']='1';
$_POST['name']='test';
$_POST['loc']='test';*/
   class MyDB extends SQLite3
   	{
	      function __construct()
	      {
	         $this->open('ESP8266.db');
	      }
	   }
   
   $db1 = new MyDB();
   if(!$db1){
      echo $db1->lastErrorMsg();
   } else {
      
	$sql = "DELETE FROM nodes WHERE IP= '".$_POST['IP']."';";
	$ret = $db1->exec($sql);
	if($ret) { echo "delete success<br>";} else {echo "failed";}
	

   $db1->close();

   $chipdata = file("controllerIP.txt");   // reads IP number for ESP
	$chipIP = $chipdata[0];
	if($chipIP==$_POST['IP']) {
		$chipIP = "";
   	$fh = fopen('controllerIP.txt','w');
		fwrite($fh,$chipIP);
		fclose($fh);
	}
	echo "<META http-equiv='refresh' content='1;URL=.'>";
}

?>
