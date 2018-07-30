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
    <td bgcolor="#FFF4CC"><? 
 include("connect.php");
$u = $_GET['user'];
$sql =  "SELECT * FROM  `tb_user`  WHERE  `encap` =  'user'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	?>
    <table width="100%" border="1" align="center">
  <tr>
    <td> <center> <font color="#0000FF" > ID PATH  </font></center></td>
    <td> <center> <font color="#333333"> username </font></center></td>
    <td><center><font color="#FF0000">  password </font></center></td>
    <td> <center> ดูข้อมูลส่งเมลล์ </center> </td>
    <td><center> <font color="#FF0000"> เคลียร์ LOG </font></center></td>
  </tr>
	<? while($row = $result->fetch_assoc()){ ?>
	 <tr>
    <td><center> <font color="#0000FF" ><? echo $row['id_user']; ?> </font> </center></td>
    <td><center> <font color="#333333"><? echo $row['user']; ?> </font> </center></td>
    <td><center><font color="#FF0000"> <? echo $row['pass']; ?> </font> </center></td>
    <td><center> <a href="user_show_log.php?id_user=<? echo  $row['id_user'];?>"><img src="images/list.png" width="41" height="41" /></a></center></td>
    <td> <center><a href="delete_data_log.php?id_user=<? echo  $row['id_user'];?>" onclick="return confirm('Are you sure you want to delete?');" ><img src="images/edit_clear.png" width="41" height="41" /></a>
    </center></td>
  </tr>
    <?
	}
	?>
	</table> <?
} 
?></td>
  </tr>
  <tr>
    <td bgcolor="#F4F5D8"><center>
     <font color="#C4C4C4"> Developer by: chokena (mini-iot) </font>
    </center> </td>
  </tr>
</table>


</body>
</html>