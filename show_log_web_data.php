<?
session_start();
$chk = $_SESSION["encap"]; 
//echo $chk;
if($chk!= "admin" && $chk != "user"){
	
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
	  
}
?>
 
  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Web Monitor</title>

    <!-- Bootstrap -->
    
    <link href="table_show.css" rel="stylesheet">

  </head>
  <body>
     
      
 <?  
 include("connect.php"); 
 $id_user = $_GET['id_user'];
 function showData(){
 include("connect.php"); 
 $id_user = $_GET['id_user'];
 $limit = $_GET['l'];	
	 $sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '13'"; 
 		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		$row = $result->fetch_assoc();
	  		$tx_d1 = $row['msg1'];
			$tx_d2 = $row['msg2'];
			$tx_d3 = $row['msg3'];
			$tx_d4 = $row['msg4'];
			$tx_d5 = $row['msg5'];
			$tx_d6 = $row['msg6'];
			$tx_d7 = $row['msg7'];
			$tx_d8 = $row['msg8'];
			$tx_d9 = $row['msg9'];
			$tx_d10 = $row['msg10'];
		}
	
	
	 $sql =  "select * from tb_web_monitor_b where id_user = $id_user ";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	 		$total =mysqli_num_rows($result);
		}
		else{ 
	  		$total =0;
		}
		
		echo "<table width='100%' border='0' class='bordered' >";
		echo "<tr>"; 
		//echo $total;
		$total_limit = $total / 50;
		 
		echo "<td>";
		echo "<font size='+1' color='#0000FF'>  Total Data = ".$total."</font>";
		echo "</td>";
		echo "<td colspan='10'> ";
		echo "<font size='+1' color='#FF0000'> Page = </font>";
		for( $i=0; $i<=$total_limit;$i++){
		  $li = $i*30;	
		  echo "<a href='show_log_web_data.php?id_user=$id_user&l=$li'>";
		  echo " <font size='+1' color='#000000' >[".($i+1)."]</a> &nbsp; </font>";	
		}
		echo "</td>";
		//echo $total_limit; 
		echo "</tr>";  	  
		$sql =  "select * from tb_web_monitor_b where id_user = $id_user  order by id desc LIMIT ".$limit." , 50";
 		             
        echo "<tr>" ; 
		echo "<th width='10'> Date/Time</th>";
		if($tx_d1!="") echo "<th width='9'>".$tx_d1."</th>";
		if($tx_d2!="") echo "<th width='9'>".$tx_d2."</th>";
		if($tx_d3!="") echo "<th width='9'>".$tx_d3."</th>";
		if($tx_d4!="") echo "<th width='9'>".$tx_d4."</th>";
		if($tx_d5!="") echo "<th width='9'>".$tx_d5."</th>";
		if($tx_d6!="") echo "<th width='9'>".$tx_d6."</th>";
		if($tx_d7!="") echo "<th width='9'>".$tx_d7."</th>";
		if($tx_d8!="") echo "<th width='9'>".$tx_d8."</th>";
		if($tx_d9!="") echo "<th width='9'>".$tx_d9."</th>";
		if($tx_d10!="") echo "<th width='9'>".$tx_d10."</th>";
		echo "</tr>";		 
				 
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		while($row = $result->fetch_assoc()){
		   		$d0 = $row['date_log'];
		   		$d1 = $row['time_on'];
		   		$d2 = $row['time_off'];
		   		$d3 = $row['d1'];
		   		$d4 = $row['d2'];
		   		$d5 = $row['ch1'];
		   		$d6 = $row['ch2'];
		   		$d7 = $row['ch3'];
		   		$d8 = $row['ch4'];
		   		$d9 = $row['ch5'];	
		   		$d10 = $row['ch6'];
				 echo "<tr>";
				 echo "<td>".$d0."</td>"; 
				 echo "<td>".$d1."</td>";
				 echo "<td>".$d2."</td>";
				 echo "<td>".$d3."</td>";
				 echo "<td>".$d4."</td>";
				 echo "<td>".$d5."</td>";
				 echo "<td>".$d6."</td>";
				 echo "<td>".$d7."</td>";
				 echo "<td>".$d8."</td>";
				 echo "<td>".$d9."</td>";
				 echo "<td>".$d10."</td>";
				 echo "</tr>"; 
				
				
				$limit = $limit *2;
			}
			
		}
        echo "</table>";
     }
 ?>
 
   <? 
	$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` ='$id_user' "; 

		$result1 = $conn->query($sql1); 
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$name1 = $row1['name']; 
			$mac = $row1['mac_no'];
			$loca = $row1['location']; 
		}
	
	?>
    
      
  <table width="80%" border="0" align="center">
      <tr>
        <td><center> <img src="images/logo.jpg" width="272" height="110" /> 
      
    </center></td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="1">
           <tr>
              <td width="25%" bgcolor="#0099FF" > <center>  <font size="+1" color="#FFFFFF">  USER DATA </font><br>
               <font size="+1" > Name : <? echo $name1; ?> </font></br>
               <font size="+1" > Number:  <? echo $mac; ?> </font></br>
               <font size="+1" >  Location: <? echo $loca; ?> </font></br>
              </center>
              </td>
              <td width="25%"   > <center>  <font size="+1" >  Home  </font><br>
               <? if($chk=="user"){ ?>
               <a href="muser.php?id_user=<? echo $id_user; ?>"> 
                <img src="images/home-icon.png" width="41" />  </a>
				<? } ?>
               <? if($chk=="admin"){ ?>
                <a href="monitor_user.php">
                 <img src="images/home-icon.png" width="41" /> 
                 </a>
				 <? } ?>
              </center>
              </td>
              <td width="25%"   > <center>  <font size="+1"  >  LOG DATA  </font><br>
               <a href="show_data_save.php?id_user=<? echo $id_user; ?>"> 
                <img src="images/list.png" width="41" />
                 </a>
              </center>
              </td>
              <td width="25%"  > <center>  <font size="+1"  >  LOGOUT  </font><br>
                <a href="logout.php"> <img src="images/logout.png" width="41" /> </a>
              </center>
              </td>

              </tr>
              <td colspan="4">
              <? showData(); ?>
              </table>
              </td>
              </table>
              </td>
              </tr>
              <tr> 
              <td bgcolor="#F4F5D8"><center>
     				<font color="#C4C4C4"> Developer by: </font><font color="#999999" size="-1" >SK SYNERGY </font>
    				</center> 
               </td>
              </tr>
              </table></body></html>