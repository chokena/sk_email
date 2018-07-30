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
<title>Email  Manager</title>
</head>
<body>
<table width="80%" border="0" align="center">
  <tr>
    <td><center>
       <img src="images/logo.jpg" width="272" height="110" /> 
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#FFF4CC"><? 
 include("connect.php");
$u = $_GET['id_user'];
$sql =  "SELECT * FROM  `db_log_error`   WHERE  `id_user` =  '$u' ORDER BY id  "; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$rowcount=mysqli_num_rows($result);
	?>
    <table width="100%" border="1" align="center">
    <tr>
    <td width="41%" bgcolor="#003300" colspan="3"> <center> <font color="#ffffff"> Home <br />
    <a href="muser.php?id_user=<? echo $u; ?>"><img src="images/home-icon.png"  width="41" />  </a>
     </font></center></td>
     
  </tr>
   <tr>
    <td width="41%" bgcolor="#00aa00" colspan="3"> <center> <font color="#ffffff"> Alram History <br />
    
     </font></center></td>
     
  </tr>
  <tr>
    <td width="30%" bgcolor="#FFFFFF"> <center> <font color="#0000FF" >Time </font></center></td>
    <td width="41%" bgcolor="#FFFFFF"> <center> <font color="#ff0000"> error_msg </font></center></td>
    <td width="41%" bgcolor="#FFFFFF"> <center> <font color="#ff0000"> Reset[Date/Time] </font></center></td> 
  </tr>
	<? while($row = $result->fetch_assoc()){ ?>
	 <tr>
    <td><center> <font color="#0000FF" ><? echo $row['time']; ?> </font> </center></td>
    <td><center> <font color="#ff0000"><? echo $row['name_er']; ?> </font> </center></td>
    <td><center> <? if($row['clear_log']=="") { ?>
    <img src="images/dev.png" width="10%"/><? }else{?><font color="#ff0000"><? echo $row['clear_log']; } ?> </font> </center></td>
     
     
  </tr>
    <?
	}
	?>
	</table> <?
} else{
	echo "<script> alert('ไม่มีข้อมูลการส่งเมลล์ '); </script>"; 
   echo '<script type="text/javascript">
           window.location = "muser.php?id_user='.$u.'"
      </script>';	
	
}
?></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><center>
     <font font color="#999999" size="-1"> Developer By: SK SYNERGY  </font>
    </center> </td>
  </tr>
</table>


</body>
</html>