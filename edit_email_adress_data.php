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
$stk = $_POST['stk'];
$m1 = $_POST['m1'];
$m2 = $_POST['m2'];
$m3 = $_POST['m3'];
$m4 = $_POST['m4'];
$m5 = $_POST['m5'];
$m6 = $_POST['m6'];
$m7 = $_POST['m7'];
$m8 = $_POST['m8'];
$m9 = $_POST['m9'];
$m10 = $_POST['m10'];

if($stk=="yes"){
//echo $id_user;
	$sql =  "UPDATE `tb_email`  SET mail1 = '$m1', mail2 = '$m2',mail3 = '$m3',mail4='$m4',mail5='$m5',mail6='$m6',mail7='$m7',mail8='$m8',mail9='$m9',mail10='$m10' where id_user='$id_user';";
 	$result = $conn->query($sql);
}else{
  $sql =  "INSERT INTO  `tb_email` values(NULL,'$m1','$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10',$id_user);";
  $result = $conn->query($sql);
}
 if($result){
   echo "<script> alert('แก้ไขข้อมูลเรียบร้อย'); </script>"; 
   //echo " <a href='add_user_machine.php?user=$u'>  เพิ้มเลขเครื่อง </a>";  
  echo '<script type="text/javascript">
           window.location ="memail_admin.php"; 
      </script>'; 	
 }else {
	  echo "<script> alert('ไม่สามารถแก้ข้อมูลได้'); </script>";
	  echo '<script type="text/javascript">
           window.location ="memail_admin.php"; 
      </script>'; 	
 }

?>
</body>
</html>