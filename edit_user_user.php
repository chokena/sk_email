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
<title>แก้ไขข้อมูลลูกค้า</title>
</head>
<?
 include("connect.php");
$u = $_GET['id_user'];
//echo $u;
$sql =  "SELECT * FROM  `tb_user`  WHERE  `id_user` =  '$u'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$id_user = $row['id_user'];
	$name = $row['user'];
	$pass = $row['pass'];
} 
//echo $name.":".$pass;

?>
<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#FFF4CC"><form id="form1" name="form1" method="post" action="edit_user_data.php">
      <center> <h1> <p>แก้ไข ข้อมูลUser</p> </h1> </center>
      <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>Username:</td> <input type="hidden" name = "id_user"  id="id_user" value="<? echo $u; ?> " />
           <td><input type="text" name="user" id="user" value="<? echo $name; ?>" /></td>
        </tr>
        <tr>
          <td>password:</td>
          <td><input type="text" name="pass" id="pass" value="<? echo $pass; ?>" /></td>
        </tr>
        <tr>
          <td>Confirm password:</td>
          <td><input type="text" name="cpass" id="cpass"  /></td>
        </tr>
        <tr>
         <tr>
          <td colspan="2"> <center > <input type="submit" name="button" id="button" value="แก้ไขข้อมูล" /> </center></td>
        </tr> 
      </table>
    </form></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><center> <font color="#999999" size="-1" >  Developer By: SK SYNERGY  </font> </center>  </td>
  </tr>
</table>
</body>
</html>