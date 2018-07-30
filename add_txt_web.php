<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
 <?
 include("connect.php");
	$id_user = $_GET['id_user'];
	$group = $_GET['group'];
    $tx1 = $_GET['tx1']; 
	$tx2 = $_GET['tx2']; 
	$tx3 = $_GET['tx3']; 
	$tx4 = $_GET['tx4']; 
	$tx5 = $_GET['tx5']; 
	$tx6 = $_GET['tx6']; 
	$tx7 = $_GET['tx7']; 
	$tx8 = $_GET['tx8']; 
	$tx9 = $_GET['tx9']; 
	$tx10 = $_GET['tx10']; 

	$led1 = $_GET['led1']; 
	$led2 = $_GET['led2']; 
	$led3 = $_GET['led3']; 
	$led4 = $_GET['led4']; 
	$led5 = $_GET['led5']; 
	$led6 = $_GET['led6']; 
	$led7 = $_GET['led7']; 
	$led8 = $_GET['led8']; 
	$led9 = $_GET['led9']; 
	$led10 = $_GET['led10']; 

	$msg_group = $_GET['msg_group']; 
	$data = $_GET['data'];
	echo "ID = ".$id_user."<BR>";
	echo "msg = ".$group."<br>";

$tm_time = date("d/m/Y  h:i:sa");
echo $tm_time. "<br>";



$sql =  "SELECT * FROM  `tb_led_show`  WHERE  `id_user` ='$id_user' and data_group='$group'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   	$row = $result->fetch_assoc();
	$ledin =1;
} else{
	$ledin =0;
}

 if($ledin==0){
	$sql_led =  "INSERT INTO  `tb_led_show` 
   		VALUES ('','$id_user','$led1', '$led2',  '$led3','$led4','$led5'
   			,'$led6','$led7','$led8','$led9','$led10','$msg_group','$group');"; 
 }else{
	 $sql_led =  "UPDATE   `tb_led_show` 
   		SET  msg1='$led1',msg2='$led2',msg3='$led3',msg4='$led4',msg5='$led5',msg6='$led6',msg7='$led7',msg8='$led8'
		   ,msg9='$led9',msg10='$led10',msg_group='$msg_group'   where  id_user = '$id_user' and data_group = '$group';";
 }

 $result = $conn->query($sql_led);
 
 if($result){
    echo "OK _LED";
 }else {
	 echo "NOT OK";
 }


 echo $data; 
 if($data==0){
	$sql3 =  "INSERT INTO  `tb_msg_show` 
   		VALUES ('','$id_user','$tx1', '$tx2',  '$tx3','$tx4','$tx5'
   			,'$tx6','$tx7','$tx8','$tx9','$tx10','$msg_group','$group');";
 }else {
	 	$sql3 =  "UPDATE   `tb_msg_show` 
   		SET  msg1='$tx1',msg2='$tx2',msg3='$tx3',msg4='$tx4',msg5='$tx5',msg6='$tx6',msg7='$tx7',msg8='$tx8',msg9='$tx9',msg10='$tx10',msg_group='$msg_group'   where  id_user = '$id_user' and data_group = '$group';";
 }
 $result3 = $conn->query($sql3);
 
 if($result3){
    echo "<script > alert('เพิ่มข้อมูลเรียบร้อยแล้ว'); </script>";
			echo '<script type="text/javascript">
           window.location = "add_text_data_monitor.php?id_user='.$id_user.'"
      </script>'; 
 }else {
	 echo "NOT OK";
 }
 

$sql =  "SELECT web  FROM  `tb_machine`  WHERE  `id_user` ='$id_user'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   	$row = $result->fetch_assoc();
	$web = $row['web'];
}

if($web==0){
	 $sql3 =  "UPDATE   `tb_machine`  SET  web='1'  where  id_user = '$id_user'";
	 $result3 = $conn->query($sql3);
}
 ?>
<body>
</body>
</html>