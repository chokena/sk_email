<?php 
include "connect.php"; 
$id_user = $_GET['id'];
$sqllog =  "SELECT * FROM  `tb_log_show`  WHERE  `id_user` =  '$id_user'"; 
$result = $conn->query($sqllog); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$log =  $row['log'];
	echo $log;
	$datalog = 1;
}else {
   $datalog = 0;
   echo "0";
}  
?>