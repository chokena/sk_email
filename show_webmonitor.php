<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="5" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Monitor</title
>
<link href="table_show.css" rel="stylesheet" type="text/css" />
</head>
<?
$id = $_GET['id'];

include("connect.php");

$sql =  "SELECT * FROM  `tb_monitor_a`  WHERE  `id_user` ='$id' order by id DESC "; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	 $data =1;
	$row = $result->fetch_assoc();
	$tm_time =  $row['data_log'];
	$pump   =  $row['pump'];
	$air =  $row['air_com'];
	$loadcell =  $row['load_cell'];
	$fan=  $row['fan'];
	$valve1 = $row['valve1'];
	$valve2 = $row['valve2'];
	$auto_bleed = $row['auto_bleed'];
	$auto_bleedoff = $row['auto_bleedoff'];
	$pump_over = $row['pump_over'];
	$air_com_over = $row['air_com_over']; 
	$run_dry1 = $row['run_dry1'];
	$mode_r = $row['mode_r'];
}


$sql =  "SELECT * FROM  `tb_monitor_b`  WHERE  `id_user` ='$id' order by id DESC "; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$timeon =  $row['timeon'];
	$timeoff   =  $row['timeoff'];
	$delay_time =  $row['delay_time'];
	$d2 =  $row['d2'];
	$analog1=  $row['analog1'];
	$analog2=  $row['analog2'];
	$analog3=  $row['analog3'];
	$analog4=  $row['analog4'];
	$analog5=  $row['analog5'];
	$analog6=  $row['analog6'];
	 
}
$sql =  "SELECT * FROM  `tb_monitor_c`  WHERE  `id_user` ='$id' order by id DESC "; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$input1 = $row['input1'];
	$input2 = $row['input2'];
	$input3 = $row['input3'];
	$output1 = $row['output1'];
	$output2 = $row['output2'];
	$output3 = $row['output3'];
	$alram1  = $row['alram1'];
	$alram2  = $row['alram2'];
	$alram3  = $row['alram3']; 
}
 


$sql1 =  "SELECT * FROM  `tx_monitor_c`  WHERE  `id_user` ='$id' "; 

$result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
	$row1 = $result1->fetch_assoc();
	$tx_in1= $row1['tx_in1']; 
	$tx_in2 = $row1['tx_in2'];
	$tx_in3 = $row1['tx_in3']; 
	$tx_out1 = $row1['tx_out1'];
	$tx_out2 = $row1['tx_out2'];
	$tx_out3 = $row1['tx_out3'];
	$tx_am1 = $row1['tx_am1'];
	$tx_am2 = $row1['tx_am2'];
	$tx_am3 = $row1['tx_am3'];
}


$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` ='$id' "; 

$result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
	$row1 = $result1->fetch_assoc();
	$name1 = $row1['name']; 
	$mac = $row1['mac_no'];
	$loca = $row1['location']; 
}


?>

<?
 function hexcon($hex){
   $h =hexdec($hex);
   $b = decbin($h);
   $ind = strlen($b);
   for($i =0;$i<(8 - $ind);$i++){
      $he = $he . "0"; 	 
   }
   $hext = $he.$b;
   return $hext; 	 
 }
 /*
 $dd = hexdec("1E");
 echo $dd."<br>";
 $data = decbin($dd); 
 echo $data."<br>";
 $l = strlen($data);
 echo  $l."<br>"; 
 
 for($i =0;$i<(8 - $l);$i++){
   $d = $d . "0"; 	 
 }
 echo "<br>";
 $data1 =  $d.$data;
 echo $data1."<br>";
 */ 
 
 // echo $data1;
 

?> 
<body>
<table width="80%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" align="center" cellpadding="0" cellspacing="0"   class="bordered">
      <tr>
        <th width="26%" rowspan="3"><img src="images/slide-item1.png" width="80%"  /></th>
        <td width="28%">Name:<font size="+1" color="#0000ff" /> <? echo $name1 ?> </td>
        <th width="23%">Time ON</th>
        <th width="23%">Time OFF</th>
      </tr>
      <tr>
        <td> Machine Number: <font size="+1" color="#0000ff" /> <? echo $mac ?> </td>
        <td > <font size="+3" color="#0000FF" /> <? echo $timeon ?></td>
        <td > <font size="+3" color="#0000FF" /> <? echo $timeoff ?> </td>
      </tr>
      <tr>
        <td>Location: <font size="+1" color="#0000ff" /> <? echo $loca ?></td>
        <th>Manual  ON</th>
        <th>Manual OFF</th>
        </tr>
      <tr>
        <td >Log In Time: </td>
        <td > <? echo $tm_time;  ?> </td>
        <td><? if($mode_r ==1)echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >";  ?> </td>
        <td><? if($mode_r ==2)echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >";  ?> </td>
        </tr>
  </table>
      <br />
    
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" class="bordered">
      <tr>
        <td colspan="14"><strong>Monitor Ozone System QMI</strong></td>
        </tr>
      <tr>
        <th>Device</th>
        <th>Status</th>
        <th>Device</th>
        <th>Status</th>
        <th>Device</th>
        <th>Status</th>
        <th>ANALOG</th>
        <th>ANALOG</th>
        <th>INPUT</th>
        <th>DATA</th>
        <th>OUTPUT</th>
        <th>DATA</th>
        <th>ALRAM</th>
        <th>DATA</th>
      </tr>
      <tr>
        <td width="8%"> <img src="images/pump.jpg" width="50" height="50" /></td>
        <td width="7%"><? if($pump >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td width="8%"><img src="images/Solenoid Valve.jpg" width="50" height="50" /><br />
          1</td>
        <td width="7%"><? if($valve1 >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td width="8%"><img src="images/pump.jpg" width="50" height="50" /> <br />
          OVER </td>
        <td width="7%"><? if($pump_over >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td width="10%"><font size="+2"  color="#0000FF" /> 1: [<font color="#FF0000" size="+2" /><? if($analog1 =="" ) echo "0"; else echo $analog1;  ?><font size="+2"  color="#0000FF" />] </td>
        <td width="10%"><font size="+2"  color="#0000FF" /> 4: [<font color="#FF0000" size="+2" /><? if($analog4 =="" ) echo "0"; else echo $analog4;  ?><font size="+2"  color="#0000FF" />] </td>
        <td width="9%"><font color="#0000FF" size="+2" ><? echo $tx_in1; ?> </font></td>
        <td width="9%"><font color="#0000FF" size="+2" ><? if($tx_in1=="") echo ""; else echo $input1; ?></font></td>
        <td width="10%"><font color="#0000FF" size="+2" ><? echo $tx_out1; ?></td>
        <td width="7%"><font color="#0000FF" size="+2" ><? if($tx_out1=="") echo ""; else echo $output1; ?></td>
        <td width="7%"><font color="#0000FF" size="+2" ><? echo $tx_am1; ?></td>
        <td width="7%"><font color="#0000FF" size="+2" ><? if($tx_am1=="") echo ""; else echo $alram1; ?></td>
      </tr>
      <tr>
        <td><img src="images/Air compessor.jpg" width="50" height="50" /></td>
        <td><? if($air >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><img src="images/Solenoid Valve.jpg" width="50" height="50" /><br />
          2</td>
        <td><? if($valve2 >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><img src="images/Air compessor.jpg" width="50" height="50" /><br />
          OVER</td>
        <td><? if($air_com_over >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><font size="+2"  color="#0000FF" /> 2: [<font color="#FF0000" size="+2" /><? if($analog2 =="" ) echo "0"; 
		else echo $analog2;  ?><font size="+2"  color="#0000FF" />]</td>
        <td><font size="+2"  color="#0000FF" /> 5: [<font color="#FF0000" size="+2" /><? if($analog5 =="" ) echo "0"; 
		else echo $analog5;  ?><font size="+2"  color="#0000FF" />]</td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_in2; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_in2=="") echo ""; else echo $input2; ?></font></td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_out2; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_out2=="") echo ""; else echo $output2; ?></font></td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_am2; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_am2=="") echo ""; else echo $alram2; ?></font></td>
      </tr>
      <tr>
        <td><img src="images/Loadcell.jpg" width="50" height="50" /></td>
        <td><? if($loadcell >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><img src="images/Auto bleed off.jpg" width="50" height="50" /> <br />
          ON </td>
        <td><? if($auto_bleed >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><img src="images/Cooling pump.jpg" width="50" height="50" /></td>
        <td><? if($run_dry1 >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><font size="+2"  color="#0000FF" /> 3: [<font color="#FF0000" size="+2" /><? if($analog3 =="" ) echo "0"; 
		else echo $analog3;  ?><font size="+2"  color="#0000FF" />]</td>
        <td><font size="+2"  color="#0000FF" /> 6: [<font color="#FF0000" size="+2" /><? if($analog6 =="" ) echo "0"; 
		else echo $analog6;  ?><font size="+2"  color="#0000FF" />]</td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_in3; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_in3=="") echo ""; else echo $input3; ?></td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_out3; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_in3=="") echo ""; else echo $output3; ?></td>
        <td><font color="#0000FF" size="+2" ><? echo $tx_am3; ?> </font></td>
        <td><font color="#0000FF" size="+2" ><? if($tx_am3=="") echo ""; else echo $alram3; ?></td>
      </tr>
      <tr>
        <td><img src="images/Fan.jpg" width="50" height="50" /></td>
        <td><? if($fan >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <td><img src="images/Auto bleed off.jpg" width="50" height="50" /> <br />
          OFF </td>
        <td><? if($auto_bleedoff >0) echo "<img src='images/on_icon.png' width='50' height='50' >" ;
							else echo "<img src='images/red_icon.png' width='50' height='50' >"; ?></td>
        <th colspan="10"></th>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>