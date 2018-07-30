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
$u = $_GET['id_user'];
$sql =  "SELECT * FROM  `db_log_error`   WHERE  `id_user` =  '$u' ORDER BY id  "; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	?>
    <table width="100%" border="1" align="center">
  <tr>
   <th colspan="4">  Alarm History </th>
  </td>
  <tr>
    <td width="30%"> <center> <font color="#0000FF" > Alarm </font></center></td>
    <td width="41%"> <center> <font color="#ff0000"> Date/time </font></center></td>
    <td width="29%"> <center> <font color="#000000"> Reset[Date/time] </font></center></td>
  </tr>
	<? while($row = $result->fetch_assoc()){ ?>
	 <tr>
    <td><center> <font color="#0000FF" ><? echo $row['name_er'];  ?> </font> </center></td>
    <td><center> <font color="#ff0000"><?  echo $row['time']; ?> </font> </center></td>
    <td><center> <? if($row['clear_log']=="") { ?> 
     <a href="email_log_reset.php?user_id=<? echo $u; ?>&id=<? echo $row['id']; ?>"> <img src="images/list.png" width="10%"/> </a> <?} else{ ?>
    <font color="#ff0000"><?  echo $row['clear_log']; }?> </font>  </center></td>
     
  </tr>
    <?
	}
	?>
	</table> <?
} else{
	echo "<script> alert('ไม่มีข้อมูลการส่งเมลล์ '); </script>"; 
   echo '<script type="text/javascript">
           window.location = "user_show.php"
      </script>';	
	
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