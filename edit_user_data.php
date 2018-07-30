<? 
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "user"){
		
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
$user = $_POST['user'];
$pass = $_POST['pass'];
$cpass= $_POST['cpass'];

if($cpass != $pass) 
  {
     echo "<script> alert('password ไม่ตรงกับ Confirm Password'); </script>"; 
   //echo " <a href='add_user_machine.php?user=$u'>  เพิ้มเลขเครื่อง </a>";  
    echo '<script type="text/javascript">
           window.location ="edit_user_user.php?id_user='.$id_user.'"; 
      </script>'; 	

  } 
//$n = $_POST['n'];
//$mac = $_POST['mac']; 
//$loca = $_POST['loca']; 
//echo $id_user.":".$user.":".$pass; 
//echo "<br>".$n.":".$mac.":".$loca; 

//echo $id_user; 

$sql = "SELECT *  from  `tb_user`  where user = '$user' ";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   $data = 1;
}else{
  $data = 0;
}

if($data==0){
  $sql =  "UPDATE `tb_user` SET user = '$user', pass = '$pass' where id_user='$id_user';";
  $result = $conn->query($sql);
  if( $result){
   echo "<script> alert('แก้ไขข้อมูลเรียบร้อย'); </script>"; 
   //echo " <a href='add_user_machine.php?user=$u'>  เพิ้มเลขเครื่อง </a>";  
  echo '<script type="text/javascript">
           window.location ="muser.php?id_user='.$id_user.'"; 
      </script>'; 	
 }else {
	  echo "<script> alert('ไม่สามารถแก้ข้อมูลได้'); </script>";
	  /*
	  echo '<script type="text/javascript">
           window.location = "add_user.php"
      </script>'; */ 	
 }
}else{
   echo "<script> alert('Username  ซ้ำ กันไม่สามารถแก้ไขข้อมูลได้ '); </script>"; 
   //echo " <a href='add_user_machine.php?user=$u'>  เพิ้มเลขเครื่อง </a>";  
  echo '<script type="text/javascript">
           window.location ="edit_user_user.php?id_user='.$id_user.'"; 
      </script>'; 	
}
?>
</body>
</html>