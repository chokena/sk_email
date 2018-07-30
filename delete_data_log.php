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
$id_user = $_GET['id_user'];

//echo $id_user;

 
$sql4 =  "delete from `db_log_error`  where id_user='$id_user';";
 $result4 = $conn->query($sql4);
 
 if($result4){
   echo "<script> alert('ลบข้อมูลเรียบร้อย'); </script>"; 
   //echo " <a href='add_user_machine.php?user=$u'>  เพิ้มเลขเครื่อง </a>";  
  echo '<script type="text/javascript">
           window.location ="user_show.php"; 
      </script>'; 	
 }else {
	  echo "<script> alert('ไม่สามารถลบข้อมูลได้'); </script>";
	  /*
	  echo '<script type="text/javascript">
           window.location = "add_user.php"
      </script>'; */ 	
 }

?>
</body>
</html>