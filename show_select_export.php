<?
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "admin" && $chk!= "user"  ){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}

include "connect.php";
$id_user = $_GET['id_user'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOG SAVE DATA DATE/TIME</title>
<link href="table_show.css" rel="stylesheet">
</head>
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
      <center> <h1 style="color:#00F"> <p> LOG DATA DATE  </p> </h1> </center>
         
      <table width="100%"  align="center" border="0" class="bordered" >
         <th> Number </th> 
         <th> DATE </th> 
         <th> LOG DATA</th>
         <th> Export Excel </th>
        <?
    $sql =  "select * from tb_web_monitor_b where id_user = $id_user order by id";
	$result = $conn->query($sql); 
    $row = $result->fetch_assoc();
    $mbe = substr($row['date_log'],4,1); 
    //echo $mbe."M";
    $sql =  "select * from tb_web_monitor_b where id_user = $id_user order by id desc";
	$result = $conn->query($sql); 
    $row = $result->fetch_assoc();
    $mend = substr($row['date_log'],4,1); 
    //echo $mend."END";
$c=0;
for($m=$mbe;$m<=$mend;$m++){
    if($m <10) $m  = "0".$m;
 for($d=1;$d<=31;$d++){
	$year = date('Y');
	if($d<10) $d = "0".$d;
	$dt = $d."/".$m."/".$year;
 $sql =  "select * from tb_web_monitor_b where id_user = $id_user and LEFT(date_log ,10) = '".$dt."'";
	$result = $conn->query($sql); 
   	if ($result->num_rows > 0) {	  
		$mc = $m;
        $ldate[$c] = $d."/".$m."/".$year;
        $sql =  "select COUNT(id_user) as count from tb_web_monitor_b where id_user = $id_user and LEFT(date_log ,10) = '".$ldate[$c]."'";
	    $result = $conn->query($sql); 
        $row1 = $result->fetch_assoc();
		//$dayn[$c] = $d."_".$m."_".$year;
        echo "<tr><td width='25%'>".($c+1)."</td>";
		echo "<td width='25%'>".$ldate[$c]."</td>";
        echo "<td width='25%'><font color=#FF0000'>".$row1['count']." </font></td>";
        echo "<td width='25%'>";
        echo "<a href='excel_save_date.php?id_user=".$id_user."&date_in=".$year."-".$m."-".$d."'>";
        echo "<img src='images/excel.png' width='41'/></a></td></tr>";
		 $c++;
	} 
  }
}
?>
            
             
            
         
      </table>
     </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC"><center> <font color="#999999" size="-1" >  Developer By: SK SYNERGY  </font> </center>  </td>
  </tr>
</table>
</body>
</html>