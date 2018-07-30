<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="10">
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
 include('check_connect.php');

  function showData(){
		  //echo $data_g."<br>";
		  //$id_user = $_GET['id_user'];
		  $col =0;
		  $sol  = $col;
		   include("connect.php");

      



       $sql =  "SELECT * FROM  `tb_machine` order by id_user "; 
   			 
    	$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  while ( $row = $result->fetch_assoc()){
		if($sol==0) echo "<tr>";  
		  
	    $id_user = $row['id_user'];
		$name = $row['name'];
		$mac_no = $row['mac_no']; 
    $model = $row['model'];
		$location = $row['location'];

     
     

		$web = $row['web'];
		echo "<td width='20%'>"; 
		echo  "<font size='+1'> ID:".$id_user."</font> ";
		echo "<a href='add_text_data_monitor.php?id_user=".$id_user."'>";
		echo "<img src='images/user.png' width='30' /> </a>";  
    
		if($web==1){
		echo "<a href='monitor_web.php?id_user=".$id_user."&type=INPUT'>";
		echo "<img src='images/show_view.png' width='30' /> </a>"; 
    echo "<a href='set_log_web.php?id_user=".$id_user."'> <img src='".check_connect($id_user)."' width='30' /> </a>";
    //echo  $img_con[$id_user]; 
		}
		else{
		 echo "<img src='images/close_red.png' width='30' /> </a>";	
		}
		 
		echo "</br> Name: <font color='#0000ff'>  "; 
		 echo $name;
		 echo "</font> </br> number: <font color='#0000ff'>  "; 
		 echo $mac_no ;
     echo "</font> </br> Model: <font color='#0000ff'>  "; 
		 echo $model ;
		 echo "</font> </br>  Location:  <font color='#0000ff'> "; 
		 echo $location; 
		 echo "</font> </td>";
		 if($sol==0)  echo "</font>";   
         $col++;
		$sol = $col%5;
	  }
	   
	  
    }else   $d_group  = 0;	
	//showconfig(); 
	
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
    $model = $row['model'];
		$location = $row['location'];
		$web = $row['web'];
		echo  "<h3> ID:".$id_user."</h3> ";
		echo "<a href='add_text_data_monitor.php?id_user=".$id_user."'>";
		echo "<img src='images/user.png' width='40' /> </a>";   
		
        
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
 
  
  
   <table width="80%" border="0" align="center">
      <tr>
        <td><center> <img src="images/logo.jpg" width="272" height="110" /> 
      
    </center></td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="1">
           <tr>
              <td bgcolor="#0099FF" > <center>  
               <font size="+1" color="#FFFFFF"> Config DATA </font><br>
                
              </center>            
              </td>
              <td width="25%"   > <center>  <font size="+1" >  Home  </font><br>
                <a href="madmin.php">
                 <img src="images/home-icon.png" width="41" /> 
                 </a>
              </center>
              </td>
              <td width="25%"  > <center>  <font size="+1"  >  LOGOUT  </font><br>
                <a href="logout.php"> <img src="images/logout.png" width="41" /> </a>
              </center>
              </td>

              </tr>
              <tr>
              <td colspan="3" bgcolor="#0099FF"> <font color="#0099FF"> -- </font>  </td>
              </tr>
             
              <td colspan="3">
              <table width="100%" border="1" >  
               
                 
                 <? showData( );  ?> 
                 </tr> 
              </table>
              </td>
              </table>
              </td>
     </tr>
     <tr> 
      <td colspan="4" bgcolor="#0099FF"> <font color="#0099FF"> -- </font>  </td>
     </tr>
              <tr> 
              <td bgcolor="#F4F5D8"><center>
     				<font color="#C4C4C4"> Developer by: </font><font color="#999999" size="-1" >SK SYNERGY </font>
    				</center> 
               </td>
              </tr>
              </table>
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