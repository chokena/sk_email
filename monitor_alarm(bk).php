<?
session_start();
$chk = $_SESSION["encap"]; 
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
       $sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '$data_g'  and msg_group ='ALARM'"; 
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
    
        if($data_g==14) $num =1;
		if($data_g==15) $num =2;
		if($data_g==16) $num =3;
        
	    $sql =  "SELECT alram".$num." FROM  `tb_web_monitor_c`  WHERE  `id_user` ='$id_user' ORDER BY  `id` DESC "; 
    		$result = $conn->query($sql); 
	 		if ($result->num_rows > 0) {  
	  		$row = $result->fetch_assoc();
	   			$input = $row['alram'.$num];
				//echo $input;
     		}
     		for($i=0;$i<8;$i++)
       			$in1[$i] = substr($input,$i,1);
				
				
				 if($d_group==1){  for($i=0;$i<8;$i++){   
        echo  "<div class='col-sm-2'  style='width:12%' >";
         
            if($msg[$i]!="")  {  
          echo  "<div class='panel panel-primary' >";
            echo  "<div class='panel-heading'>";  echo $msg[$i];         
            echo "</div>";
            echo "<div class='panel-body'>"; 
              if($in1[(7-$i)]==0 ) {  
            echo "<div class='led-red'>  </div> ";
            echo "<p align='center'> STOP  </p> "; 
              }    
             if($in1[(7-$i)]==1 ) {  
            echo "<div class='led-yellow'>  </div>";
            echo "<p align='center'> RUN  </p>";
              }   
            
            echo "</div>";
          echo "</div>";
              } 
        echo "</div>";
          }}  	
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
 
 
 
 ?>
 
   <div class="row" >
      <div class="col-sm-2"   >
      <div class="panel panel-success" >
            <div class="panel-heading">     
            </div>
            <div class="panel-body">  </div>
            <img src="images/logo.jpg" width="100%" />
           </div> 
       </div>
       
       <div class="col-sm-2"   >
      <div class="panel panel-info" >
            <div class="panel-heading">   TIME:  ON  
            </div>
            <div class="panel-body">  <h1 style="color:#F00" align="center"> <? echo $time_on; ?> </h1> </div>
             
           </div> 
       </div>
       
        <div class="col-sm-2"   >
      <div class="panel panel-default" >
            <div class="panel-heading">   TIME: OFF  
            </div>
            <div class="panel-body">  <h1 style="color:#F00" align="center"> <? echo $time_off; ?> </h1> </div>
             
           </div> 
       </div>
       
        <div class="col-sm-2"   >
      <div class="panel panel-danger" >
            <div class="panel-heading">  Delay Time 1: 
            </div>
            <div class="panel-body">  <h1 style="color:#F00" align="center"> <? echo $d1; ?> </h1> </div>
             
           </div> 
       </div>
       
        <div class="col-sm-2"   >
      <div class="panel panel-danger" >
            <div class="panel-heading">   Delay Time 2:   
            </div>
            <div class="panel-body">  <h1 style="color:#F00" align="center"> <? echo $d2; ?> </h1> </div>
             
           </div> 
       </div>
       
    </div>
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
    <div class="row" >
      <div class="col-sm-3"   >
      <div class="panel panel-success" >
            <div class="panel-heading"><h4 style="color:#003" > Name : <? echo $name1; ?> </h4>     
            </div>
            <div class="panel-body">Number: <? echo $mac; ?> <br/>
            Location: <? echo $loca; ?> <br/>
             </div>
             
           </div> 
       </div>
       
       <div class="col-sm-3"   >
      <div class="panel panel-success" >
            <div class="panel-heading"><h4 style="color:#003" > Log In Time :  </h4>     
            </div>
            <div class="panel-body"><h4 style="color:#00F"> Date/Time: <? echo $tm_time; ?> </h4>  
             
             </div>
             
           </div> 
       </div>
       
        <div class="col-sm-1"   >
      <div class="panel panel-info" >
            <div class="panel-heading">  HOME    
            </div>
            <div class="panel-body">
            <? if($chk=="user"){ ?> 
			 <a href="muser.php?id_user=<? echo $id_user; ?>"> 	
             <img src="images/home.jpg" width="80%"/> 
             </a> <? } ?>
             <? if($chk=="admin"){ ?> 
			<a href="monitor_user.php">
             <img src="images/home-icon.png" width="80%"/> 
             </a> <? } ?>
             </div>
             
           </div> 
       </div>
       
       <div class="col-sm-1"   >
      <div class="panel panel-default" >
            <div class="panel-heading">  DATA    
            </div>
            <div class="panel-body">
            <a href="show_data_save.php?id_user=<? echo $id_user; ?>"> 
             <img src="images/list.png" width="80%"/> 
             </a>
             
             </div>
             
           </div> 
       </div>
       
        <div class="col-sm-1"   >
      <div class="panel panel-danger" >
            <div class="panel-heading"> LOGOUT     
            </div>
            <div class="panel-body">
           <a href="logout.php">  <img src="images/logout.png" width="80%"/> </a>
             </div>
             
           </div> 
       </div>
       
       </div>

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" ><a href="monitor_input.php?id_user=<? echo $id_user; ?>">INPUT</a></li>
        <li role="presentation" ><a href="monitor_output.php?id_user=<? echo $id_user; ?>">OUTPUT</a></li>
        <li role="presentation" class="active"><a href="monitor_alarm.php?id_user=<? echo $id_user; ?>">ALARM</a></li>
        <li role="presentation"><a href="monitor_analog.php?id_user=<? echo $id_user; ?>">ANALOG</a></li>
      </ul>
       
        
     <?  for($i=14;$i<=16;$i++){ ?>
      <div class="row">
      <? 
	    showData($i);  
	  ?>       
      </div>
      <? }?>
      
      
    
      
              
            
   
	 
	 
 

<script >
$( function() {
  var $winHeight = $( window ).height()
  $( '.container' ).height( $winHeight );
});

</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>