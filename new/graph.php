<canvas id="chart1"></canvas>
<canvas id="chart2"></canvas>
<canvas id="chart3"></canvas>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<script src="assets/js/custom.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin.min.js"></script>
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/sb-admin-charts.min.js"></script>
<script src="js/sb-admin-charts.min_line.js"></script>
<?php 
    date_default_timezone_set("Asia/Bangkok");
    include "../connect.php";
    $m = date('m');
    $y = date('Y')+543;
    $d = date('d');
    $tx = '/'.$m.'/'.$y;
    $dd = date('d/m/Y');   
    $tdate = "25"."/".$m."/".date('Y');
    $sql = "SELECT * FROM tb_web_monitor_b where id_user = 5 and LEFT(date_log,10) ='$tdate' ";
    $result = $conn->query($sql);
    $day = array();
    if ($result->num_rows > 0) {	  
       while( $row = $result->fetch_assoc()){
           $day[] = $row;
       }
    }
    $week = array();
    for($i=0;$i<=6;$i++){
        $tdate = ($d-(6-$i))."/".$m."/".date('Y');
        $sql = "SELECT  *  FROM `tb_web_monitor_b` where id_user = 5  and LEFT(date_log,10) ='$tdate'";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while( $row = $result->fetch_assoc()){
                $week[] = $row;
            }
        }
    }
    $month = array();
    for($i=0;$i<=30;$i++){
        $tdate = ($d-(30-$i))."/".$m."/".date('Y');
        $sql = "SELECT  *  FROM `tb_web_monitor_b` where id_user = 5  and LEFT(date_log,10) ='$tdate'";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while( $row = $result->fetch_assoc()){
                $month[] = $row;
            }
        }
    }

?>
<script type='text/javascript' src="graph.js"></script>
<script>
    var day = <?php echo json_encode($day) ?>;
    drawChart(day, "chart1", "ch3", "pressure day")
    var week = <?php echo json_encode($week) ?>; 
    drawChart(week, "chart2", "ch3", "pressure week")
    var month = <?php echo json_encode($month) ?>; 
    drawChart(month, "chart3", "ch3", "pressure month")
</script>