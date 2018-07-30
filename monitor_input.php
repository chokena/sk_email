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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Web Monitor</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/led.css" rel="stylesheet">

  </head>
  <body>
     
      
 <?  
 include("connect.php"); 
 $id_user = $_GET['id_user'];
	  
	  
  function showData($data_g){
		  //echo $data_g."<br>";
		  $id_user = $_GET['id_user'];
		   include("connect.php");
       $sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '$data_g'  and msg_group ='INPUT'"; 
   			$i=0;
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  $row = $result->fetch_assoc();
	  $msg_group = $row['msg_group'];
	 while($i<8){
	  $txt = "msg".($i+1);
	   $msg[$i] =  $row[$txt];
	  // echo $msg[$i];
	   $i++;	  
	  }
	   $d_group  = 1;
    }else   $d_group  = 0;	
    

    $sql =  "SELECT * FROM  `tb_led_show`  WHERE  `id_user` ='$id_user' and data_group = '$data_g'  and msg_group ='INPUT'"; 
   			$i=0;
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  $row = $result->fetch_assoc();
	  $msg_group = $row['msg_group'];
	 while($i<8){
	  $led = "msg".($i+1);
	   $leds[$i] =  $row[$led];
	  // echo $msg[$i];
	   $i++;	  
	  }
	   $d_group  = 1;
    }else   $d_group  = 0;	
    

    
        
	    $sql =  "SELECT input".$data_g." FROM  `tb_web_monitor_a`  WHERE  `id_user` ='$id_user' ORDER BY  `id` DESC "; 
    		$result = $conn->query($sql); 
	 		if ($result->num_rows > 0) {  
	  		$row = $result->fetch_assoc();
	   			$input = $row['input'.$data_g];
				//echo $input;
     		}
     		for($i=7;$i>=0;$i--){ 
       			 if(substr($input,$i,1)!='')
               $in1[$i] = substr($input,$i,1);
            else 
               $in1[$i] = '0';

               //echo $in1[$i];
         }
				
	      if($d_group==1){  for($i=0;$i<8;$i++){   
				 
            if($msg[$i]!="")  {
 
            echo  "<td width='10%'> <center> ";
			echo $msg[$i];         
            echo " </center> <br/>";
            
              if($in1[7-$i]==0 ) {
                if($leds[$i]=='R')      { $ledt = "led-red";  $ledm = "STOP"; } 
                else if($leds[$i]=='Y') { $ledt = "led-yellow"; $ledm = "Wording"; }
                else { $ledt = "led-red";  $ledm = "STOP"; }
                  echo "<div class='$ledt'>  </div> ";
                  echo "<p align='center'> $ledm  </p> "; 
              }    
             if($in1[7-$i]==1 ) {
                 
            echo "<div class='led-green'>  </div>";
            echo "<p align='center'> RUN  </p>";
              }   
            
             echo "</td>";
              } 
			  
          }
		  
		  }  	
  }
 
 ?>
 <? 
 			$id_user = $_GET['id_user'];
		   include("connect.php");
       $sql =  "SELECT * FROM  `tb_web_monitor_b`  WHERE  `id_user` ='$id_user' ORDER BY  `id` DESC  ";
   			$i=0;
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  $row = $result->fetch_assoc();
	  		$tm_time =  $row['date_log'];
	  		$time_on = $row['time_on'];
			$time_off = $row['time_off'];
			$d1 = $row['d1'];
			$d2 = $row['d2'];
	    
    }else  {
		 $time_on  = 0;
		 $time_off  = 0;
		 $d1  = 0;
		 $d2  = 0;
	}
   
   $sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '13'"; 
 		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		$row = $result->fetch_assoc();
	  		$tx_tx1 = $row['msg1'];
			$tx_tx2 = $row['msg2'];
			$tx_d1 = $row['msg3'];
			$tx_d2 = $row['msg4'];
		}
 
 
 ?>
  
   <? 
	$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` ='$id_user' "; 

		$result1 = $conn->query($sql1); 
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$name1 = $row1['name']; 
			$mac = $row1['mac_no'];
      $model= $row1['model'];
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
               <font size="+1" > Model:  <? echo $model; ?> </font></br>
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
            <? include("show_head_log.php"); ?>
            

            <? include("head_data_time.php"); ?>
           
              
            <tr>
              <td width="25%" bgcolor="#4E9880" > <center>  <font size="+2" color="#FFFFFF">  INPUT </font><br>
              <a href="monitor_input.php?id_user=<? echo $id_user; ?> "> <img src="images/list.png" width="30" /> </a>
              
              </center>
              <br/>
              </td>
              <td width="25%"   > <center>  <font size="+2" >  OUTPUT </font><br>
               <a href="monitor_output.php?id_user=<? echo $id_user; ?> "> <img src="images/list.png" width="30" /> </a>
                
              </center>
              <br/>
              </td>
              <td width="25%"   > <center>  <font size="+2"  >  ANALOG  </font><br>
               <a href="monitor_analog.php?id_user=<? echo $id_user; ?> "> <img src="images/list.png" width="30" /> </a>
                
              </center>
              <br/>
              </td>
              <td width="25%"  > <center>  <font size="+2"  >  ALARM  </font><br>
               <a href="monitor_alarm.php?id_user=<? echo $id_user; ?> "> <img src="images/list.png" width="30" /> </a>
                
              </center>
              <br/>
              </td>

              </tr>
              <td colspan="4">
              <table width="100%" border="1" >  
               <?  for($i=1;$i<13;$i++){ ?> 
                 <tr> 
                 <? showData($i);  ?> 
                 </tr> <? } ?> 
              </table>
              </td>
              </table>
              </td>
              </tr>
              <tr> 
              <td bgcolor="#F4F5D8"><center>
     				<font color="#C4C4C4"> Developer by: SK SYNERGY  </font>
    				</center> 
               </td>
              </tr>
              </table></body></html>