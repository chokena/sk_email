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
$m1 = $_POST['m1'];
$m2 = $_POST['m2'];
$m3 = $_POST['m3'];
$m4 = $_POST['m4'];
$m5 = $_POST['m5'];
$m6 = $_POST['m6'];
$m7 = $_POST['m7'];
$m8 = $_POST['m8'];
$m9 = $_POST['m9'];
//echo $id_user;
$sql =  "SELECT * FROM  `tb_email`  WHERE  `id_user` =  '$id_user'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$st = "NOT";
}else{
  $st = "OK";	
}
//echo $st;
if($st=="OK"){
	 $sql1 =  "INSERT INTO  `tb_email` values(NULL,'$m1','$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10',$id_user);";
 $result1 = $conn->query($sql1);
 if($result1){
   echo "<script> alert('เพิ่มข้อมูลเรียบร้อย'); </script>"; 
   echo '<script type="text/javascript">
           window.location = "memail_admin.php"
      </script>';	
 }else {
	  echo "<script> alert('ไม่สามารถเพิ่มข้อมูลได้'); </script>";
	  echo '<script type="text/javascript">
           window.location = "add_user_email.php"
      </script>';	
 }
}
else{	
 echo "<script> alert('มีข้อมูลอยู่แล้ว '); </script>";	
 echo '<script type="text/javascript">
           window.location = "add_user_email.php"
      </script>';
}

?>
</body>
</html>