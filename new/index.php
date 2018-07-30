<?php 
@session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="10" />
    <title>SYNERGY</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
date_default_timezone_set("Asia/Bangkok");
$chk = $_SESSION["encap"]; 
if( $chk!= "user"  ){
	echo '<script type="text/javascript">
        window.location = "../index.php"
        </script>';
}
$id_user = $_GET['id_user'];
echo $id_user;
include "../connect.php";
$sql = "select * from  db_log_error where id_user = $id_user"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$rowcount=mysqli_num_rows($result);
	//echo $rowcount;
}else {
	$rowcount = 0;
}

function check_connect($id_user){
    include "../connect.php";

   // echo $id_user;

    

 
    $sql =  "select * from tb_web_monitor_b where id_user = $id_user  order by id DESC";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
         $row = $result->fetch_assoc();
         $l_date = $row['date_log'];
	 		//$total =mysqli_num_rows($result);
       $ci = substr($l_date,-2,2);
      // echo $l_date;
		}

$time = date('d/m/Y h:i:sa');
$time_log = explode(" ",$time); 
$tm_time = explode(":",$time_log[1]);
$tm_day = explode("/",$time_log[0]);
$day = $tm_day[0];
$m = $tm_day[1];
$y = $tm_day[2];
$hour = $tm_time[0];
$min = $tm_time[1];
 $cs = substr($time,-2,2);
$t_log = explode(" ",$l_date); 
$t_time = explode(":",$t_log[2]);
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
   }
   else {
       $data_con = "Disconnet";
       
       $col = "#FF0000";
   }
  }else{
    $data_con = "Disconnet";
    $col = "#FF0000";
     
  }
 }else{
  $data_con = "Disconnet";
    $col = "#FF0000";
    
}
 
//echo $img_con[$id_user];
return $data_con;
} 

$id_user = $_GET['id_user'];
include("../connect.php");


$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` ='$id_user' "; 

		$result1 = $conn->query($sql1); 
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$name1 = $row1['name']; 
			$mac = $row1['mac_no'];
			$loca = $row1['location']; 
		}


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
		 $time_on  = "0";
		 $time_off  = "0";
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

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">WEB MONITOR</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <font color ="#FFFFFF">Name : <?php echo $name1; ?> </font> <br>
                    <font color ="#FFFFFF">Number : <?php echo $mac; ?> </font> <br> 
                    <font color ="#FFFFFF">Location : <?php echo $loca; ?> </font><br>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="edit_user.php?id_user=<?php echo $id_user; ?>"><i class="fa fa-cog fa-3x"></i> EDIT USER</a>
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-bell-o fa-3x"></i> EMAIL ALARM  <font color = "red"> <?php echo $rowcount ?> </font> Mail </a>
                    </li>
						   <li  >
                        <a   href="../monitor_input.php?id_user=<?php echo $id_user; ?>"><i class="fa fa-tasks fa-3x"></i> WEB MONITOR</a>
                    </li>	
                       
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        
            <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard</h2>   
                        <h5>Welcome   </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                 
             <?php 
                if($time_on > "0"){
                    $tx_data = $time_on; 
                    $cor = "panel panel-primary text-center no-boder bg-color-green";
                    $rr = "panel-footer back-footer-green";
                    $tx_o = "ON";
                }
                else {
                    //if($time_off > "O") {
                        $tx_data = $time_off;
                        $cor = "panel panel-primary text-center no-boder bg-color-red";
                        $rr = "panel-footer back-footer-red";
                        $tx_o = "OFF"; 
                    //}
                }
                 
            ?>
            
                    
                
                 <!-- /. ROW  -->
                <div class="row"> 
                    
                      
                               <div class="col-md-9 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Log data
                        </div>
                        <div class="panel-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>            
                </div>
                <?php $c = check_connect($id_user); 
                            if($c =="CONNECT") $d = "green";
                            else $d = "red";         
                                 
                                 ?>
                    <div class="col-md-3 col-sm-12 col-xs-12">                       
                    <? echo "<div class='panel panel-primary text-center no-boder bg-color-$d'>"; ?>
                        <div class="panel-body">
                           <? if($c =="CONNECT") 
                                echo "<i class='fa fa-check  fa-5x'></i>";
                            else  
                                echo "<i class='fa fa-close  fa-5x'></i>"; ?>
                                 
                                 
                            <h3><?php echo $c; ?> </h3>
                        </div>
                        <?php 
                        if($c=="CONNECT") 
                            echo  "<div class='panel-footer back-footer-green'>";
                        else  
                            echo  "<div class='panel-footer back-footer-red'>";
                        ?>
                        <?php echo $c; ?>     IRAS Borad
                            
                        </div>
                    </div>
                    <div class="<?php echo $cor; ?>">
                        <div class="panel-body">
                            <i class="fa fa-refresh fa-5x"></i>
                            <h3><?php echo $tx_data; ?> Sec</h3>
                        </div>
                        <div class="<?php echo $rr; ?>">
                            OZONE <?php echo $tx_o; ?>
                            
                        </div>
                    </div>                         
                        </div>
                
           </div>            
    </div>




             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script src="js/sb-admin-charts.min_line.js"></script>

<?php 
$m = date('m');
$y = date('Y')+543;
$d = date('d');
$tx = '/'.$m.'/'.$y;
$dd = date('d/m/Y');
//echo $dd;

$sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '13'"; 
 		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		$row = $result->fetch_assoc();
            $hed1 = $row['msg7'];    
        }     

        //echo $pr;

for($i=0;$i<=6;$i++){
   $tdate = ($d-(6-$i))."/".$m."/".date('Y');
    //echo $tdate;
    $sql = "SELECT  *  FROM `tb_web_monitor_b` where id_user = $id_user  and LEFT(date_log,10) ='$tdate' order  by id desc ";
    $result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		$row = $result->fetch_assoc();
	  		$pr[$i] = $row['ch3'];
              //echo $pr[$i];
		}
        //echo $pr[6];
    //$tdate ="";
    //echo $pr[$i]."/";
}
?>



    <script>

    //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["<?php echo ($d-6).$tx;  ?>", "<?php echo ($d-5).$tx;  ?>",
         "<?php echo ($d-4).$tx;  ?>", "<?php echo ($d-3).$tx;  ?>", "<?php echo ($d-2).$tx;  ?>",
          "<?php echo ($d-1).$tx;  ?>", "<?php echo ($d).$tx;  ?>"],
        datasets: [
            {
                label: "<?php echo $hed1;  ?>",
                fillColor: "rgba(52, 209, 44, 0.9)",
                strokeColor: "rgba(52, 209, 44, 0.9)",
                pointColor: "rgba(52, 209, 44, 0.9)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(52, 209, 44, 0.9)",
                data: ['<?php echo $pr[0]; ?>','<?php echo $pr[1]; ?>','<?php echo $pr[2]; ?>',
                '<?php echo $pr[3]; ?>', '<?php echo $pr[4]; ?>', '<?php echo $pr[5]; ?>', '<?php echo $pr[6]; ?>']
            }
        ]
    },
    options: {
        responsive: true
    }
});

</script>

   
</body>
</html>
