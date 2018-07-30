<?  
 include("connect.php"); 
 $id_user = $_GET['id_user'];
	  
	  
  function check_connect($id_user){
    include("connect.php");

   // echo $id_user;

    $sql2 =  "SELECT * FROM  `tb_alm_log`  where  `id_user` = $id_user";
        $result1 = $conn->query($sql2); 
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $run = $row1['alm'];
        }else{
          $img_con[$id_user] = "images/editem.png";
        }

if($run==1){
    $sql =  "select * from tb_web_monitor_b where id_user = $id_user  order by id DESC";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
         $row = $result->fetch_assoc();
         $l_date = $row['date_log'];
	 		//$total =mysqli_num_rows($result);
       //$ci = substr($l_date,-2,2);
      // echo $l_date;
		}

$tm = date("H:i:s");
$year = date("Y")+543;
$time = date("d/m")."/".$year." ".$tm;
//echo $time;
//$cs = substr($time,-2,2);

//$time = date('d/m/Y :i:sa');
$time_log = explode(" ",$time); 
$tm_time = explode(":",$time_log[1]);
$tm_day = explode("/",$time_log[0]);
$day = $tm_day[0];
$m = $tm_day[1];
$y = $tm_day[2];
//echo $day.":".$m.":".$y;
$hour = $tm_time[0];
$min = $tm_time[1];
//echo $hour.":".$min;

$t_log = explode(" ",$l_date); 
$t_time = explode(":",$t_log[1]);
$ts_day = explode("/",$t_log[0]);
$t_day = $ts_day[0];
$t_m = $ts_day[1];
$t_y = $ts_day[2];
$t_hour = $t_time[0];
$t_min = $t_time[1];
//echo $t_day.":".$t_m;

if($cs==$ci){
  if($day == $t_day && $m == $t_m && $y == $t_y){
   if($hour==$t_hour && $t_min <= ($min)){
       $data_con = "CONNECT"; 
       $img_con[$id_user] = "images/on_icon.png";
       $col = "#0000FF"; 
   }
   else {
       $data_con = "NOT CONNECT";
       $img_con[$id_user] = "images/red_icon.png";
       $col = "#FF0000";
   }
  }else{
    $data_con = "NOT CONNECT";
    $col = "#FF0000";
    $img_con[$id_user] = "images/red_icon.png";
  }
 }else{
  $data_con = "NOT CONNECT";
    $col = "#FF0000";
    $img_con[$id_user] = "images/red_icon.png";
}
}
else{
  $img_con[$id_user] = "images/editem.png";
}
//echo $img_con[$id_user];
return $img_con[$id_user];
}