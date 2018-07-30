<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ทดสอบ</title>

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

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">INPUT</a></li>
        <li role="presentation"><a href="#">OUTPUT</a></li>
        <li role="presentation"><a href="#">ALARM</a></li>
        <li role="presentation"><a href="#">ANALOG</a></li>
      </ul>
       
        
     <?  for($i=1;$i<=12;$i++){ ?>
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