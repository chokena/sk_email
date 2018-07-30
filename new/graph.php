<canvas id="ch1"></canvas>
<canvas id="ch2"></canvas>
<canvas id="ch3"></canvas>

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
    $results = array();
    if ($result->num_rows > 0) {	  
       while( $row = $result->fetch_assoc()){
           $results[] = $row;
       }
    }
?>

<script>
//line
    var res = <?php echo json_encode($results) ?>;
    var ch1 = res.map(data => data.ch1);
    var ch2 = res.map(data => data.ch2);
    var ch3 = res.map(data => data.ch3);
    var time = res.map(data => data.date_log);
    var id1 = document.getElementById("ch1").getContext('2d');
    var id2 = document.getElementById("ch2").getContext('2d');
    var id3 = document.getElementById("ch3").getContext('2d');

    function drawChart (id, labels, data) {
        return new Chart(id, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'labels',
                        fillColor: "rgba(52, 209, 44, 0.9)",
                        strokeColor: "rgba(52, 209, 44, 0.9)",
                        pointColor: "rgba(52, 209, 44, 0.9)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(52, 209, 44, 0.9)",
                        data: data
                    }
                ]
            },
            options: {
                responsive: true
            }
            });
    }   
    drawChart(id1, time, ch1);
    drawChart(id2, time, ch2);
    drawChart(id3, time, ch3);
</script>