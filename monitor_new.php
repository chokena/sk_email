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
    <meta http-equiv="refresh" content="10">
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
            echo "<div class='led-red'>  </div> ";
            echo "<p align='center'> STOP  </p> "; 
              }    
             if($in1[7-$i]==1 ) {  
            echo "<div class='led-yellow'>  </div>";
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
            <? include("show_head_log.php"); ?>
            

            <? include("head_data_time.php"); ?>
            <td colspan="4">
               <canvas id="canvas"></canvas>
            </td>  
              
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
              
              </table>
              </td>
              </tr>
              <tr> 
              <td bgcolor="#F4F5D8"><center>
     				<font color="#C4C4C4"> Developer by: SK SYNERGY  </font>
    				</center> 
               </td>
              </tr>
              </table>
              
              <?
			  	date_default_timezone_set('Asia/Bangkok');
			    $d  = date('d'); 
				$m  =  date('m');
				$y  = date('Y');



	  $sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '13'"; 
   	  $i=0;
      $result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  $row = $result->fetch_assoc();
	  $msg_group = $row['msg_group'];
	 while($i<6){
	    $txt = "msg".($i+5);
	   $msg[$i] =  $row[$txt];
	  // echo $msg[$i];
	   $i++;	  
	  }
	   $d_group  = 1;
      }else   $d_group  = 0;	

				
			$sql =  "SELECT  * FROM  `tb_web_monitor_b`  WHERE  `id_user` ='$id_user' ORDER BY  `id` DESC "; 
    		$result = $conn->query($sql); 
	 		if ($result->num_rows > 0) {  
	  		$row = $result->fetch_assoc();
	   			$ch1 = $row['ch1'];
				$ch2 = $row['ch2'];
				$ch3 = $row['ch3'];
				$ch4 = $row['ch4'];
				$ch5 = $row['ch5'];
				$ch6 = $row['ch6'];
				 
     		}
					 			  
			  ?>
            	<script src="js/Chart.bundle.js"></script>
				<script src="js/utils.js"></script>
              </body></html>
  <script>
		var config = {
			type: 'line',
			data: {
				labels: [<? for($i=7;$i>=0;$i--){ echo ($d-$i).",";} ?>],
				datasets: [{
					label: '<? echo $msg[0];  ?>',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						 
					],
					fill: false,
				}, {
					label: '<? echo $msg[1]; ?>',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						 
					],
				}, {
					label: '<? echo $msg[2]; ?>',
					fill: false,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [
						 
					],
				 }, {
					label: '<? echo $msg[3]; ?>',
					fill: false,
					backgroundColor: window.chartColors.yellow,
					borderColor: window.chartColors.yellow,
					data: [
						 
					],
				 }, {
					label: '<? echo $msg[4]; ?>',
					fill: false,
					backgroundColor: window.chartColors.orange,
					borderColor: window.chartColors.orange,
					data: [
						 
					],	
				 }, {
					label: '<? echo $msg[5]; ?>',
					fill: false,
					backgroundColor: window.chartColors.gray,
					borderColor: window.chartColors.gray,
					data: [
						 
					],	
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'DATA LOG ANALOG'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: '<? echo date('M/Y'); ?>'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		});
	</script>