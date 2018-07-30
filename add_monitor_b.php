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
	$tm = date("H:i:s");
	$year = date("Y")+543;
$tm_time = date("d/m")."/".$year." ".$tm;
echo $tm_time. "<br>";


$data = explode(",",$msg);
echo strlen($data)."<br>";
for($i=0;$i<10;$i++){
	echo $data[$i]."<br>";
   
}

$sql3 =  "INSERT INTO  `tb_web_monitor_b`   VALUES ('','$id_user','$tm_time', '$data[0]','$data[1]','$data[2]','$data[3]'
   ,'$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]');";
 //$sql3 =  "INSERT INTO  `tb_monitor_b` (`id_user` ,`data_log` ,`timeon`) VALUES ('$id_user','$tm_time', '$msg')";
 $result3 = $conn->query($sql3);
 if($result3){
   echo "insert OK";	 
 }else {
	 echo "NOT OK";
 }

 $sql =  "INSERT INTO  `tb_msg_b` VALUES ('','$id_user','$msg');";
 $result = $conn->query($sql);
 
 if($result){
   echo "insert OK";	 
 }else {
	 echo "NOT OK";
 }
 
 ?>
<body>
</body>
</html>