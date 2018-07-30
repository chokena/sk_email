<?php
include("connect.php");
$id_user = $_GET['id_user'];
$sql =  "select * from tb_alm_log where id_user = $id_user";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
         $row = $result->fetch_assoc();
         //$dayc = $row['days'];
	 		//$total =mysqli_num_rows($result);
           if($row['alm']==1) $alm =0; 
           else  $alm=1;  
		 $sql =  "update  `tb_alm_log`  set alm = '$alm'  where id_user = '$id_user' "; 
         $res = $conn->query($sql); 
         
         }else{
           $sql =  "insert  into `tb_alm_log`  values('','$id_user','1',0,0,0,0)"; 
           $res = $conn->query($sql);  
        }
 echo "<script>  alert('Change DATA LOG OK'); window.location.href = 'monitor_user.php' </script>";
?>