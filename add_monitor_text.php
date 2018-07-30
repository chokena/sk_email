<?
$id_user = $_GET['id_user'];
$group = $_GET['group'];
/*
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "admin"){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
 
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email  Manager</title>
</head>
    <link href ="table_show.css" rel="stylesheet" type="text/css"></link>
<body>
<? 
include("connect.php"); 




$sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '$group'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	 $data =1;
  $id = $row['id'];
	$mg1 = $row['msg1']; 
	$mg2 = $row['msg2']; 
	$mg3 = $row['msg3']; 
	$mg4 = $row['msg4']; 
	$mg5 = $row['msg5']; 
	$mg6 = $row['msg6']; 
	$mg7 = $row['msg7']; 
	$mg8 = $row['msg8']; 
	$mg9 = $row['msg9']; 
	$mg10 = $row['msg10'];
	$msg_group = $row['msg_group']; 
	$txbt = "แก้ไขข้อมูล"; 
	 //echo $data; 
}else {
	
   	$data = 0 ;
	$txbt = "เพิ่มข้อมูล";
   	//echo $data;	
}


?>
    <table width="80%" border="0" align="center" >
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
      <td bgcolor="#FFF4CC"   ><form id="form1" name="form1" method="get" action="add_txt_web.php">
            <table width="60%" border="1" cellspacing="0" align="center" >
        <tr>
          <td width="31%">จัดการข้อความ</td>
          <td width="34%">ข้อมูล</td>
          <td width="35%">LED SHOW</td>
        </tr>
        <tr>
            <td>ข้อความที่ 1       <input type="hidden" name="id_user" value="<? echo $id_user; ?>" />      </td>
          <td><input name="tx1" type="text" id="tx1" size="30"  value="<? echo $mg1; ?>"/></td>
          <td>Red<input name="led1" type="radio" id="led1" value="R"/>
          Yellow<input name="led1" type="radio" id="led1" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 2 <input type="hidden" name="group" value="<? echo $group; ?>" />  </td>
          <td><input name="tx2" type="text" id="tx2" size="30" value="<? echo $mg2; ?>" /></td>
          <td>Red<input name="led2" type="radio" id="led2" value="R"/>
          Yellow<input name="led2" type="radio" id="led2" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 3  <input type="hidden" name="data" value="<? echo $data; ?>" />  </td>
          <td><input name="tx3" type="text" id="tx3" size="30"  value="<? echo $mg3; ?>" /></td>
          <td>Red<input name="led3" type="radio" id="led3" value="R"/>
          Yellow<input name="led3" type="radio" id="led3" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 4 </td>
          <td><input name="tx4" type="text" id="tx4" size="30"  value="<? echo $mg4; ?>" /></td>
          <td>Red<input name="led4" type="radio" id="led4" value="R"/>
          Yellow<input name="led4" type="radio" id="led4" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 5 </td>
          <td><input name="tx5" type="text" id="tx5" size="30"  value="<? echo $mg5; ?>" /></td>
          <td>Red<input name="led5" type="radio" id="led5" value="R"/>
          Yellow<input name="led5" type="radio" id="led5" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 6 </td>
          <td><input name="tx6" type="text" id="tx6" size="30"  value="<? echo $mg6; ?>" /></td>
          <td>Red<input name="led6" type="radio" id="led6" value="R"/>
          Yellow<input name="led6" type="radio" id="led6" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 7 </td>
          <td><input name="tx7" type="text" id="tx7" size="30" value="<? echo $mg7; ?>"  /></td>
          <td>Red<input name="led7" type="radio" id="led7" value="R"/>
          Yellow<input name="led7" type="radio" id="led7" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 8 </td>
          <td><input name="tx8" type="text" id="tx8" size="30"  value="<? echo $mg8; ?>" /></td>
          <td>Red<input name="led8" type="radio" id="led8" value="R"/>
          Yellow<input name="led8" type="radio" id="led8" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 9 </td>
          <td><input name="tx9" type="text" id="tx9" size="30" value="<? echo $mg9; ?>" /></td>
          <td>Red<input name="led9" type="radio" id="led9" value="R"/>
          Yellow<input name="led9" type="radio" id="led9" value="Y"/></td>
        </tr>
        <tr>
          <td>ข้อความที่ 10 </td>
          <td><input name="tx10" type="text" id="tx10" size="30" value="<? echo $mg10; ?>" /></td>
          <td>Red<input name="led10" type="radio" id="led10" value="R"/>
          Yellow<input name="led10" type="radio" id="led10" value="Y"/></td>
        </tr>
        <tr>
          <td>เลือก GROUP </td>
          <td><label for="msg_group" ></label>
            <select name="msg_group" id="msg_group" >
              <option value="INPUT" >INPUT</option>
              <option value="OUTPUT" >OUTPUT</option>
              <option value="ALARM">ALARM</option>
            </select> <br> DATA GROUP = <font color ="#ff0000"> <? echo $msg_group; ?> </font> </td>
            
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"> <center> <input type="submit" name="button" id="button" value="<? echo $txbt;  ?>"  /> <a href="del_msg_txt.php?id=<?php echo $id;?>&id_user=<?php echo $id_user; ?>" onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูล?')">ลบข้อมูล</a> </center> </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td></tr></table></body></html>