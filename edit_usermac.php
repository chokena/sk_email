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
$user = $_POST['user'];
$pass = $_POST['pass'];
$n = $_POST['n'];
$mac = $_POST['mac']; 
$loca = $_POST['loca']; 
$model = $_POST['model'];
$sql =  "UPDATE `tb_user` SET user = '$user', pass = '$pass' where id_user='$id_user';";
$result = $conn->query($sql);


$sql = "select * from  `tb_machine`  where id_user='$id_user'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
  $sql1 =  "UPDATE `tb_machine` SET name = '$n', mac_no = '$mac' , location = '$loca',model='$model' where id_user='$id_user';";
  $result1 = $conn->query($sql1);
}else{
   $sql1 =  "INSERT INTO  `tb_machine` values('','$n','$mac','$loca','$id_user','0','$model');";
   $result1 = $conn->query($sql1);
}

echo '<script type="text/javascript">
           alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
      </script>';
echo '<script type="text/javascript">
           window.location = "edit_user_m.php?id_user='.$id_user.'"
      </script>';
?>
</body>
</html>