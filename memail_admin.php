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
    <td bgcolor="#CDFCF7"><table width="100%" border="0">
      <tr>
        <td width="21%"><a href="add_text_email.php"> <center> <img src="images/text.png" width="41" height="41" /><br />
          เพิ่มข้อความ Email </center></a></td>
        <td width="27%"><p><a href="add_user_email.php"> <center> <img src="images/emaild.png" width="41" height="41" /><br />
         เพิ่มที่อยู่ Email</center> </a> </p></td>
        <td width="31%"><center>
          <a href="user_show_email_tx.php"><img src="images/editem.png" width="41" height="41" /><br />
          แก้ไข ข้อความ Email
          </a>
        </center></td>
        <td width="21%"><center>
          <a href="user_show_email_adress.php"><img src="images/email-edit-icon.png" width="41" height="41" />
          <br />
          แก้ไข ที่อยู่ Email
          </a>
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