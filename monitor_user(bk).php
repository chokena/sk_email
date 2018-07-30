<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Web monitor</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/led.css" rel="stylesheet">

  </head>
  <body>
     
      
 <?  
 include("connect.php"); 
 $id_user = $_GET['id_user'];
	  
	  
  function showData(){
		  //echo $data_g."<br>";
		  //$id_user = $_GET['id_user'];
		   include("connect.php");
       $sql =  "SELECT * FROM  `tb_machine` "; 
   			 
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  while ( $row = $result->fetch_assoc()){
	    $id_user = $row['id_user'];
		$name = $row['name'];
		$mac_no = $row['mac_no']; 
		$location = $row['location'];
		$web = $row['web'];
		echo "<div class='col-sm-3'>";
        echo "<div class='panel panel-info'>";
        echo "<div class='panel-heading'>"; 
		echo  "<h3> ID:".$id_user."</h3> ";
		if($web==1){
		echo "<a href='monitor_input.php?id_user=".$id_user."'>";
		echo "<img src='images/user.png' width='40' /> </a>";  
		}
		else{
		 echo "NO  </br> DATA WEB </br>";	
		}
		echo "</div>"; 
        echo "<div class='panel-body'>"; 
		echo "<h5 style='color:#000'> Name: "; 
		 echo $name."</h5>";
		 echo "<h5 style='color:#000'> number: "; 
		 echo $mac_no."</h5>";
		 echo "<h5 style='color:#000'> Location: "; 
		 echo $location."</h5>"; 
		 
		echo "</div>";
        echo "</div>";
		echo "</div>";     
        
	  }
	   
	  
    }else   $d_group  = 0;	
  }
  
   function showconfig(){
		  //echo $data_g."<br>";
		  //$id_user = $_GET['id_user'];
		   include("connect.php");
       $sql =  "SELECT * FROM  `tb_machine` "; 
   			 
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  while ( $row = $result->fetch_assoc()){
	    $id_user = $row['id_user'];
		$name = $row['name'];
		$mac_no = $row['mac_no']; 
		$location = $row['location'];
		$web = $row['web'];
		echo "<div class='col-sm-1'>";
        echo "<div class='panel panel-primary'>";
        echo "<div class='panel-heading'>"; 
		echo  "<h3> ID:".$id_user."</h3> ";
		echo "</div>"; 
        echo "<div class='panel-body'>"; 
		echo "<a href='add_text_data_monitor.php?id_user=".$id_user."'>";
		echo "<img src='images/user.png' width='40' /> </a>";   
		 
		echo "</div>";
        echo "</div>";
		echo "</div>";     
        
	  }
	   
	  
    }else   $d_group  = 0;	
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
            <img src="images/slide-item1.png" width="100%" />
           </div> 
       </div>
      <div class="col-sm-1"   >
      <div class="panel panel-info" >
            <div class="panel-heading">  HOME    
            </div>
            <div class="panel-body">
             
			 <a href="madmin.php">
             <img src="images/home-icon.png" width="80%"/>  </a>
              
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
    
    
     <div class="row">
     <div class="col-sm-1"   >
      <div class="panel panel-primary" >
            <div class="panel-heading">  เพิ่มข้อมูล   
            </div>
            <div class="panel-body">  <h4> Web  Monitor  </h4>  </div>
             
           </div> 
       </div>
      <? 
	   showconfig(); 
	  ?>       
      </div>
      
       
        
     
      <div class="row">
      <? 
	   showData(); 
	  ?>       
      </div>
      
      
      
    
      
              
            
   
	 
	 
 

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