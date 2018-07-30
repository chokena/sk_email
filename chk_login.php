<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$user = $_POST['u']; 
$pass = $_POST['p']; 
//echo $user.":".$pass; 
include('connect.php'); 

$sql = "SELECT *  FROM  `tb_user`  WHERE  `user` =  '$user' AND  `pass` =  '$pass'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
  $iduser  = $row['id_user']; 
  $chk	=  $row['encap']; 
  $user   =  $row['user'];  	
  $_SESSION["encap"] = $chk;
  //echo $chk; 
}
else {
 echo "<script> alert('USER และ Password ไม่ถูกต้อง'); </script>";	
echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';	
	

}

if($chk == "admin") {
	$_SESSION["encap"] = "admin";
	echo '<script type="text/javascript">
           window.location = "madmin.php"
      </script>';	
	  
	 
}
else {
	 $_SESSION["encap"] = "user";
  echo '<script type="text/javascript">
           window.location = "new/index.php?id_user='.$iduser.'";
      </script>';	
	   
}

?>
<body>
</body>
</html>