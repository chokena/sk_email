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
<title>แก้ไขข้อความ Email</title>
</head>

<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#CDFCF7"><form id="form1" name="form1" method="post" action="edit_email_data.php">
      <center> <font color="#0000FF" size = "5px" > เพิ่มข้อความ ที่จะส่งเมลล์  </font></center>
      <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#CDFCF7">
        <tr>
          <td width="45%">USER ID :</td>
          <td width="55%"><input name="id_user" type="hidden" value="<? echo $_GET['id_user']; ?>" />  <font color="#FF0000" > <? echo $_GET['id_user']; ?> </font>
      <input name="stk" type="hidden" value="yes" />    
    <?php 
    include('connect.php'); 
	$user =  $_GET['id_user'];
    $sql = "SELECT * from tb_mail where id_user='$user'";
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
    // output data of each row
	?>
         
	 <?
    while($row = $result->fetch_assoc()) {
		
		$m1 = $row['msg1'];
		$m2 = $row['msg2'];
		$m3 = $row['msg3'];
		$m4 = $row['msg4'];
		$m5 = $row['msg5'];
		$m6 = $row['msg6'];
		$m7 = $row['msg7'];
		$m8 = $row['msg8'];
		$m9 = $row['msg9'];
		$m10 = $row['msg10'];
		$m11 = $row['msg11'];
		$m12 = $row['msg12'];
		$m13 = $row['msg13'];
		$m14 = $row['msg14'];
		$m15 = $row['msg15'];
		$m16 = $row['msg16']; 
	}
	}
	else {?> 
	  <input name="id_user" type="hidden" value="<? echo $_GET['id_user']; ?>" />
      <input name="stk" type="hidden" value="no" />
	<? 
	 }
    ?>
    
    
 </td >
        </tr>
        <tr>
          <td>ข้อความ 1</td>
          <td> <input type="text" name="m1" size="40" value="<? echo $m1; ?>"/></td>
        </tr>
        <tr>
          <td>ข้อความ 2</td>
          <td><input type="text" name="m2"  size="40" value="<? echo $m2; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 3</td>
          <td><input type="text" name="m3"  size="40" value="<? echo $m3; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 4</td>
          <td><input type="text" name="m4" size="40"  value="<? echo $m4; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 5</td>
          <td><input type="text" name="m5" size="40" value="<? echo $m5; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 6</td>
          <td><input type="text" name="m6" size="40" value="<? echo $m6; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 7</td>
          <td><input type="text" name="m7"  size="40" value="<? echo $m7; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 8</td>
          <td><input type="text" name="m8"  size="40"  value="<? echo $m8; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 9</td>
          <td><input type="text" name="m9" size="40" value="<? echo $m9; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 10</td>
          <td><input type="text" name="m10" size="40" value="<? echo $m10; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 11</td>
          <td><input type="text" name="m11" size="40" value="<? echo $m11; ?>"  /></td>
        </tr>
        <tr>
          <td>ข้อความ 12</td>
          <td><input type="text" name="m12" size="40"   value="<? echo $m12; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 13</td>
          <td><input type="text" name="m13" size="40" value="<? echo $m13; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 14</td>
          <td><input type="text" name="m14"  size="40" value="<? echo $m14; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 15</td>
          <td><input type="text" name="m15" size="40" value="<? echo $m15; ?>" /></td>
        </tr>
        <tr>
          <td>ข้อความ 16</td>
          <td><input type="text" name="m16"  size="40" value="<? echo $m16; ?>" /></td>
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