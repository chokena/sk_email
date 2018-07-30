<? 
session_start();
$chk = $_SESSION["encap"]; 
//echo $chk;
if($chk!= "admin"){
	
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
	  
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 71px;
	height: 40px;
	z-index: 1;
	left: 935px;
	top: 132px;
}
</style>
</head>
 
<body>
<table width="80%" border="0" align="center">
  <tr>
    <td  ><center> <img src="images/logo.jpg" width="272" height="110" /> 
      
    </center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" bgcolor="#CDFCF7">
      <tr>
        <td width="25%"><center> 
          <a href="muser_admin.php"><img src="images/cus.png" width="41" height="41" />จัดการลูกค้า </a>
        </center></td>
        <td width="25%"><center> 
          <a href="memail_admin.php"><img src="images/email-icon.png" width="41" height="41" />จัดการอีเมลล์ </a>
        </center> </td>
        <td width="25%"><center> 
          <a href="monitor_user.php"><img src="images/icon_list.png" width="41" height="41" />ดูข้อมูล Web Monitor</a>
        </center> </td>
        <td width="25%"><center> <a href="logout.php"><img src="images/logout.png" width="42" height="42" />ออกจากระบบ </a></center></td>
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