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
<title>เพิ่ม   Emai Address to SEND</title>
</head>

<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#CDFCF7" ><form id="form1" name="form1" method="post" action="add_ad_mail.php">
      <p>&nbsp;</p>
      <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45%">USER:</td>
          <td width="55%">
    <?php 
    include('connect.php'); 
    $sql = "SELECT * from tb_user where encap='user'";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
    // output data of each row
	?>
     <select name="id_user"  >     
	 <?
    while($row = $result->fetch_assoc()) { 
    ?>
    
    <option value="<? echo  $row['id_user']; ?>"><?php echo $row['user']."  ID:".$row['id_user'];   ?></option> 
    <?php } } ?>
</select>

 </td>
        </tr>
        <tr>
          <td>Email 1</td>
          <td> <input type="text" name="m1"  size="30" /></td>
        </tr>
        <tr>
          <td>Email 2</td>
          <td><input type="text" name="m2" size="30" /></td>
        </tr>
        <tr>
          <td>Email 3</td>
          <td><input type="text" name="m3"  size="30" /></td>
        </tr>
        <tr>
          <td>Email 4</td>
          <td><input type="text" name="m4" size="30" /></td>
        </tr>
        <tr>
          <td>Email  5</td>
          <td><input type="text" name="m5" size="30" /></td>
        </tr>
        <tr>
          <td>Email 6</td>
          <td><input type="text" name="m6"  size="30" /></td>
        </tr>
        <tr>
          <td>Email 7</td>
          <td><input type="text" name="m7" size="30" /></td>
        </tr>
        <tr>
          <td>Email 8</td>
          <td><input type="text" name="m8"  size="30"/></td>
        </tr>
        <tr>
          <td>Email 9</td>
          <td><input type="text" name="m9" size="30" /></td>
        </tr>
        <tr>
          <td>Email 10</td>
          <td><input type="text" name="m10"  size="30" /></td>
        </tr>
        <tr>
          <td colspan="2"> <center > <input type="submit" name="button" id="button" value="บันทึก" /> </center></td>
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