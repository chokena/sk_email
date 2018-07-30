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


function HextoBin($hex){
   //$he = dechex($hex);
   //$h =hexdec($he);
   $b = decbin($hex);
   $ind = strlen($b);
   for($i =0;$i<(8 - $ind);$i++){
      $he = $he . "0"; 	 
   }
   $hext = $he.$b;
   return $hext; 	 
 }
 
 

$data_a = explode(",",$msg);
$len_data = (count($data_a));
echo "Lenght = ". $len_data."<br>";
for($i=0;$i<$len_data+1;$i++){
	//echo $data_a[$i+2]."()"."<br>";
    //echo HextoBin("FF");
	if($i <=($len_data-2)){
    echo $data_a[$i+1].",";
		echo $data[$i] =  HextoBin($data_a[$i+1]);
		echo "<br>";
	}
}

$sql3 =  "INSERT INTO  `tb_web_monitor_a` 
   VALUES ('','$id_user','$tm_time', '$data[0]',  '$data[1]','$data[2]','$data[3]'
   ,'$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]');";
 $result3 = $conn->query($sql3);
 
 if($result3){
   echo "insert OK";	 
 }else {
	 echo "NOT OK";
 }
 
 $sql =  "INSERT INTO  `tb_msg_a` VALUES ('','$id_user','$msg');";
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