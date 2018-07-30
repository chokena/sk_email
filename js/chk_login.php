<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<? 
include("connect.php");
$user = $_POST['u'];
$pass = $_POST['p'];
//echo $user;
//echo $pass;
$sql = "SELECT * FROM  `tb_user`  WHERE  `user` =  '$user' AND  `pass` =  '$pass'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
   if($row['encap']=='admin'){
	  //echo "admin";
	  echo " <meta http-equiv='refresh' content='1; url=madmin.php'>";   
   }
   if($row['encap']=='user'){
	  //echo "user";
	  echo " <meta http-equiv='refresh' content='1; url=muser.php'>";   
   }
  //echo "ok"; 	
  
}else {
  echo "<script>  alert('User and Password ไม่ถูกต้อง '); </script>";
  echo " <meta http-equiv='refresh' content='1; url=index.php'>";
  }
$conn->close();
?>
<body>
</body>
</html>