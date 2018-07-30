<? 
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "admin" && $chk!= "user"  ){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>ศูนย์กลางจัดการข้อมูล</title>
</head>
<?
 include("connect.php");
$id_user = $_GET['id_user'];
//echo $u;
 
//echo $name.":".$pass;
$sql =  "select * from tb_web_monitor_b where id_user = $id_user ";
	$result = $conn->query($sql); 
   	if ($result->num_rows > 0) {	  
	 $rowcount=mysqli_num_rows($result);
	}
	else{ 
	  $rowcount =0;
	}

?>
<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
     <? if($chk=="admin") { ?>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a> <? } ?> 
       <? if($chk=="user") { ?>
         <a href="muser.php?id_user=<? echo $id_user; ?>"><img src="images/logo.jpg" width="272" height="110" /></a> <? } ?> 
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#FFF4CC"> 
      <center> <h1 style="color:#00F"> <p>ศูนย์กลางการจัดเก็บข้อมูล </p> </h1> </center>
         
      <table width="90%"  align="center" cellpadding="0" cellspacing="0">
        <tr>
          <?     
            
              $date_in = date("Y-m-d");
             
          ?>
           <td width="30%">  <center> <a href="show_log_web_data_bk.php?id_user=<? echo $id_user; ?>&l=0&date_in=<? echo $date_in; ?>" > 
          <img src="images/icon_list.png"  width="60"  /> <br />
          <font   color="#FF0000" >DATA = <? echo $rowcount;  ?> </font> <br  />
          <font  color="#0000FF" >Show DATA LOG </font> </a> </center></td> 
             
           
          <td width="30%">  <center> <a href="excel_save.php?id_user=<? echo $id_user; ?>" > 
          <img src="images/text.png"  width="60"  /> <br />
          <font   color="#FF0000" >DATA = <? echo $rowcount;  ?> </font> <br  />
          <font   color="#0000FF" > Export Excel </font> </a> </center></td> 
           <? if($chk == "admin"){ ?> 
           
           <td width="30%">
		   <a href="delete_web_log.php?id_user=<? echo $id_user; ?>" 
           onclick="return confirm('ต้องการลบข้อมูล DATA LOG?')">
             <center>  <img src="images/close_red.png" width="60" /> <br  />
            <font   color="#0000FF" > Delete Log </font> </center></a></td>
           
           <?  }?>

           
        </tr>
      </table>
     </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><center> <font color="#999999" size="-1" >  Developer By: SK SYNERGY  </font> </center>  </td>
  </tr>
</table>
</body>
</html>