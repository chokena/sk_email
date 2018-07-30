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
$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` =  '$u'"; 
$result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
	$row1 = $result1->fetch_assoc();
	$namemac = $row1['name'];
	$mac_no = $row1['mac_no'];
	$loca = $row1['location'];
  $model = $row1['model'];
	//$id_user = $row['id_user'];
} 
?>
<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#FFF4CC"><form id="form1" name="form1" method="post" action="edit_usermac.php">
      <center> <h1> <p>แก้ไข ข้อมูลUser</p> </h1> </center>
      <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>Username:</td>
          <td><input type="text" name="user" id="user" value="<? echo $name; ?>" /></td>
        </tr>
        <tr>
          <td>password:</td>
          <td><input type="text" name="pass" id="pass" value="<? echo $pass; ?>" /></td>
        </tr>
        <tr>
          <td width="45%">ชื่อ: <input name="id_user" type="hidden" value="<? echo $id_user; ?>" /></td>
          <td width="55%"> <input type="text" name="n" id="n" value="<? echo $namemac; ?>" /></td>
        </tr>
        <tr>
          <td>เลขเครื่อง:</td>
          <td><input type="text" name="mac" id="mac" value="<? echo $mac_no;  ?>" /></td>
        </tr>
        <tr>
          <td>รหัสเครื่อง:</td>
          <td><input type="text" name="model" id="model" value="<? echo $model;  ?>" /></td>
        </tr>
        <tr>
          <td>สถานที่:</td>
          <td><input type="text" name="loca" id="loca" value="<? echo $loca;  ?>" /></td>
        </tr>
        <tr>
          <td colspan="2"> <center > <input type="submit" name="button" id="button" value="แก้ไขข้อมูล" /> </center></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td bgcolor="#F4F5D8"><center>
     <font color="#C4C4C4"> Developer by: chokena (mini-iot) </font>
    </center> </td>
  </tr>
</table>
</body>
</html>