
<body bgcolor='#E6E6E6'>
<?PHP
$chipIP = $_POST['chipIP'];
$fh = fopen('controllerIP.txt','w');
fwrite($fh,$chipIP);
fclose($fh);
echo "IP: ".$chipIP." saved!";
echo "<META http-equiv='refresh' content='1;URL=.'>";
?>