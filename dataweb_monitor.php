<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 <?
 include("connect.php");
	$id_user = $_GET['id'];
	$msg = $_GET['msg'];

	echo "ID = ".$id_user."<BR>";
	echo "msg = ".$msg."<br>";

$tm_time = date("d/m/Y  h:i:sa");
echo $tm_time. "<br>";


$data_a = explode(",",$msg);
echo strlen($data)."<br>";
for($i=0;$i<12;$i++){
	echo $data_a[$i]."<br>";
    echo hexdec($data_a[$i]);
	$data[$i] =  hexdec($data_a[$i]);
}

$sql3 =  "INSERT INTO  `tb_monitor_a` (`id_user` ,`data_log` ,`pump`,`air_com`,`load_cell`,`fan`,`valve1`,`valve2`,`auto_bleed`,`auto_bleedoff`,`pump_over`
,`air_com_over`,`run_dry1`,`mode_r`)
   VALUES ('$id_user','$tm_time', '$data[0]',  '$data[1]','$data[2]','$data[3]'
   ,'$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]');";
 $result3 = $conn->query($sql3);
 if($result3){
   echo "insert OK";	 
 }else {
	 echo "NOT OK";
 }

 
 
 ?>
<body>
</body>
</html>