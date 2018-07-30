<? 
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
$u = $_POST['u'];
$p = $_POST['p'];
//echo $id_user;
$sql =  "SELECT * FROM  `tb_user`  WHERE  `user` =  '$u'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$st = "NOT";
}else{
  $st = "OK";	
}
echo $u;
if($st=="OK"){
	 $sql1 =  "INSERT INTO  `tb_user` values(NULL,'$u','$p','user');";
 $result1 = $conn->query($sql1);
 if($result1){
   echo "<script> alert('เพิ่มข้อมูลเรียบร้อย'); </script>"; 
   echo " <a href='add_user_machine.php?user=$u'>  เพิ่มเลขเครื่อง </a>";  
   echo '<script type="text/javascript">
           window.location ="add_user_machine.php?user='.$u.'"; 
      </script>'; 	
 }else {
	  echo "<script> alert('ไม่สามารถเพิ่มข้อมูลได้'); </script>";
	  echo '<script type="text/javascript">
           window.location = "add_user.php"
      </script>'; 	
 }
}
else{	
 echo "<script> alert('ชื่อ USER ถูกใช้งานแล้ว'); </script>";	
 echo '<script type="text/javascript">
           window.location = "add_user.php"
      </script>';
}

 

?>
</body>
</html>