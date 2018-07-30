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
<title>Email  Manager</title>
</head> 
<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" bgcolor="#CDFCF7">
      <tr>
        <td width="21%"> <center> <img src="images/user.png" width="41" height="41" /> <a href="add_user.php">เพิ่ม User  </a> </center></td>
        <td width="27%"><center> <img src="images/dev.png" width="41" /><a href=" user_show.php">ดูข้อมูล  User</a>
        </center></td>
        <td width="31%"><center> <img src="images/edituser.png" width="41" height="41"  />
            <a href="user_show_data.php">แก้ไข  User</a>
        </center></td>
        <td width="21%"><center> <img src="images/deluser.png" width="41" height="41" />
            <a href="user_show_delete.php">ลบ User</a>
        </center></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#F4F5D8"><center>
     <font color="#C4C4C4"> Developer by: chokena (mini-iot) </font>
    </center> </td>
  </tr>
</table>
</body>
</html>