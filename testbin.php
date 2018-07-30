<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Monitor</title
></head>
<style>
 table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 90%;    
	text-align:center;
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;       
	   
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: center;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
	text-align:center;
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
	text-align:center;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
    border-radius: 0 0 6px 6px
}
</style>
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
 $dd = hexdec("FF");
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
 $data1 = hexcon("FF"); 
 echo $data1;
 $data2 = hexcon("FE"); 
 $data3 = hexcon("04"); 
 $data4 = hexcon("12"); 
 // echo $data1;
 

?> 
<body>
<table width="80%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" class="bordered">
      <tr>
        <th width="26%" rowspan="3">&nbsp;</th>
        <td width="28%">Name:</td>
        <td width="23%">Time ON</td>
        <td width="23%">Time OFF</td>
      </tr>
      <tr>
        <td> Machine Number:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Location:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td >Log In Time: </td>
        <td colspan="3">  </td>
        </tr>
  </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="0"  class="bordered">
        <tr>
          <th width="23%" align="center">number</th>
          <th width="12%" align="center">1</th>
          <th width="11%" align="center">2</th>
          <th width="10%" align="center">3</th>
          <th width="10%" align="center">4</th>
          <th width="9%" align="center">5</th>
          <th width="8%" align="center">6</th>
          <th width="8%" align="center">7</th>
          <th width="9%" align="center">8</th>
        </tr>
        <tr>
          <td align="center">PUMP</td>
          <? 
		  
		  for($i =0; $i<8;$i++){
  			$d1[$i] =   substr((string)$data1,$i,1);
  //echo $d1[$i].":"; 
  		   if($d1[$i]== 1){
	 			echo "<td> <center> <img src='images/pump_on.gif' width='50' />  </center> </td>";  
   			}else{
	 			echo "<td> <center><img src='images/pump_off.fw.png' width='50' /> </center> </td>";   
   			}
  
 			}
		  ?>
          
        </tr>
        <tr>
          <td align="center">AIR</td>
          <? 
		  
		  for($i =0; $i<8;$i++){
  			$d1[$i] =   substr((string)$data2,$i,1);
  //echo $d1[$i].":"; 
  		   if($d1[$i]== 1){
	 			echo "<td> <center> <img src='images/air_com_on.gif' width='50' />  </center> </td>";  
   			}else{
	 			echo "<td> <center><img src='images/aircom_off.fw.png' width='50' /> </center> </td>";   
   			}
  
 			}
		  ?>
          
        </tr>
        <tr>
          <td align="center">Load Cell</td>
          <? 
		  
		  for($i =0; $i<8;$i++){
  			$d1[$i] =   substr((string)$data3,$i,1);
  //echo $d1[$i].":"; 
  		   if($d1[$i]== 1){
	 			echo "<td> <center> <img src='images/load_cell_on.gif' width='50' />  </center> </td>";  
   			}else{
	 			echo "<td> <center><img src='images/loadcell_off.fw.png' width='50' /> </center> </td>";   
   			}
  
 			}
		  ?>
          
        </tr>
         <tr>
          <td align="center">Fan</td>
          <? 
		  
		  for($i =0; $i<8;$i++){
  			$d1[$i] =   substr((string)$data4,$i,1);
  //echo $d1[$i].":"; 
  		   if($d1[$i]== 1){
	 			echo "<td> <center> <img src='images/fan_on.gif' width='50' />  </center> </td>";  
   			}else{
	 			echo "<td> <center><img src='images/fan_off.fw.png' width='50' /> </center> </td>";   
   			}
  
 			}
		  ?>
          
        </tr>
      </table>
      <br />
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>