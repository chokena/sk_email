<?
 $sql =  "select * from tb_web_monitor_b where id_user = $id_user  order by id DESC";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
         $row = $result->fetch_assoc();
         $l_date = $row['date_log'];
         $id_l = $row['id'];
	 		//$total =mysqli_num_rows($result);
             //$ci = substr($l_date,-2,2);
		}
date_default_timezone_set("Asia/Bangkok");
$tm = date("H:i:s");
$year = date("Y")+543;
$time = date("d/m")."/".$year." ".$tm;


$time_log = explode(" ",$time); 
$tm_time = explode(":",$time_log[1]);
$tm_day = explode("/",$time_log[0]);
$day = $tm_day[0];
$m = $tm_day[1];
$y = $tm_day[2];
$hour = $tm_time[0];
$min = $tm_time[1];
//$cs = substr($time,-2,2);
$t_log = explode(" ",$l_date); 
$t_time = explode(":",$t_log[1]);
$ts_day = explode("/",$t_log[0]);
$t_day = $ts_day[0];
$t_m = $ts_day[1];
$t_y = $ts_day[2];
$t_hour = $t_time[0];
$t_min = $t_time[1];
//echo $t_hour."/".$t_min."::".$hour."/".($min-1);
if($cs==$ci){
if($day == $t_day && $m == $t_m && $y == $t_y){
   if($hour==$t_hour && $t_min <= ($min)){
       $data_con = "CONNECT"; 
       $col = "#0000FF"; 
	   $c = true;
   }
   else {
       $data_con = "DISCONNECT";
       $col = "#FF0000";
	   $c = false;
   }
}else{
    $data_con = "DISCONNECT";
    $col = "#FF0000";
	$c = false;
}
}else{
    $data_con = "DISCONNECT";
    $col = "#FF0000";
	$c = false;
}

//echo $hour."/".$min;


if($c==false){
    $sql = "select * from tb_s_connect where id_user = '$id_user'"; 
    $result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
            $row = $result->fetch_assoc();
            $idd = $row['id'];
            $id_log = $row['id_log'];
            $d = true;
        }else{
            $d = false;
        }

    if($d)
        $sql = "UPDATE tb_s_connect  SET id_log='$id_l' where id = '$idd'";
    else 
        $sql = "INSERT INTO tb_s_connect values('','$id_user','$id_l') ";
    
    $result1 = $conn->query($sql);

    $sql = "select * from tb_web_monitor_b  where id_user = '$id_user' and id = '$id_log'"; 
    $result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
            $row = $result->fetch_assoc();
            $tm_log = $row['date_log'];
        }
    


}

?>
 <tr>
              <td width="25%" bgcolor="#0099FF" > <center>  <font size="+1" color="#FFFFFF"> Status </font><br>
              </center>
              </td>
              <td width="25%" ><center> <font size="+1" color="<? echo $col; ?>"> <?  echo $data_con; ?> </font><br>
              </center>
              </td>
              <td width="25%" bgcolor="#8A2D57"><center>  <font size="+1" color="#FFFFFF"> Connect Time   </font><br>
              <font size="+1" color="#FFFFFF">  Last Connect  Time  </font>
              </center>
              </td>
              <td width="25%" ><center> <font size="+1" color="#0000FF"> 
              <? if($c){ ?>
              <div id="MyClockDisplay" class="clock"></div>  <? } else   echo $l_date; ?> </font><br>
              <font size="+1" color="#0000FF">
              <?  echo $tm_log; ?> </font><br>
              </center>
              </td>
            </tr>
 <script> 
 function showTime(){
    var date = new Date();
    var h  = date.getHours(); // 0 - 23
    var m  = date.getMinutes(); // 0 - 59
    var s  = date.getSeconds(); // 0 - 59 
    var d  = date.getDate(); 
    var mt = date.getMonth()+1;
    var y  = date.getYear()+1900+543;
    var yi = y+543;
    //var session = "AM";
    /*
    if(h == 0){
        h = 12;
    
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    */
    var time = d+"/"+mt+"/"+y+" "+h + ":" + m + ":" + s;
   
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    document.getElementById("MyClockDisplay1").innerText = time;
    document.getElementById("MyClockDisplay1").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
</script>