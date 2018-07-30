<? 
session_start();
$id_user = $_GET['id_user'];
$chk = $_SESSION["encap"]; 
if($chk!= "user"){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
?>
<? 
include "connect.php";
$sql = "select * from  db_log_error where id_user = $id_user"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$rowcount=mysqli_num_rows($result);
	//echo $rowcount;
}else {
	$rowcount = 0;
}

$sql = "select * from  `tb_machine`  where id_user = $id_user and web ='1' "; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$data = 1;
}else {
  $data = 0; 	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Login </title>
</head>
<body>
<table width="80%" border="0" align="center">
  <tr>
    <td><table width="90%" border="0" align="center">
      <tr>
        <td colspan="4"><center> <img src="images/logo.jpg" width="272" height="110" /> </center></td>
        </tr>
      <tr>
      <td width="25%"> <center> <a href="edit_user_user.php?id_user=<? echo $id_user; ?>">
        <img src="images/dev.png" width="42" height="42" />   <br /> 
        <font color="#FF0000" >  Edit User </font> </a></center></td>
        <td width="25%"> <center> <a href="show_email_log.php?id_user=<? echo $id_user; ?>">
        <img src="images/emaild.png" width="42" height="42" />   <br /> 
        <font color="#FF0000" > [ <? echo $rowcount; ?> ]  </font> <br />
        Alarm History </a></center></td>
        <? if($data==1){ ?>
        <td width="25%"><center> <a href="monitor_input.php?id_user=<? echo $id_user; ?> "> 
        <img src="images/list.png" width="42"  /><br /> 
         Web Monitor </a></center> </td> 
         <? } ?>
        <td width="25%"> <center> <a href="logout.php"><img src="images/logout.png" width="42" height="42" /><br />
        ออกจากระบบ </a></center></td>
      </tr>
      <tr>
        <td colspan="4" bgcolor="#CCCCCC"><center> <font color="#999999" size="-1" >  Developer By: SK SYNERGY  </font> </center>  </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>