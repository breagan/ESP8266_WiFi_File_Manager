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
      
	$sql = "INSERT INTO nodes (IP,Name,Location) VALUES('".$_POST['IP']."', '".$_POST['name']."',' ".$_POST['loc']."');";
	$ret = $db1->exec($sql);
	if($ret) { echo "insert success<br>";} else {echo "failed";}
	

   $db1->close();
   $chipIP = $_POST['IP'];
   $fh = fopen('controllerIP.txt','w');
	fwrite($fh,$chipIP);
	fclose($fh);
	echo "IP: ".$chipIP." saved!";
	echo "<META http-equiv='refresh' content='1;URL=.'>";
}

?>
