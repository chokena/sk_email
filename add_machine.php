<?php 
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "admin"){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>Email Adress</title>
</head>

<body>
<? 
 include("connect.php");
$id_user = $_POST['id_user'];
$n = $_POST['n'];
$mac = $_POST['mac'];
$loca = $_POST['loca'];
$model = $_POST['model'];
 echo $id_user; 
  echo $n; 
  echo $mac; 
  echo $loca; 
 $sql1 =  "INSERT INTO  `tb_machine` values('','$n','$mac','$loca','$id_user','0','$model');";
 $result1 = $conn->query($sql1);
 if($result1){
   echo "<script> alert('เพิ่มข้อมูลเรียบร้อย'); </script>"; 
   echo '<script type="text/javascript">
           window.location = "muser_admin.php"
      </script>';  	
 }else {
	
	  echo "<script> alert('ไม่สามารถเพิ่มข้อมูลได้'); </script>";
	  echo '<script type="text/javascript">
           window.location = "add_user_machine.php"
      </script>'; 	
 }

 

 

?>
</body>
</html>