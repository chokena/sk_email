<?php 
include "connect.php"; 
$id_user = $_GET['id'];
$sqllog =  "SELECT * FROM  `tb_log_show`  WHERE  `id_user` =  '$id_user'"; 
echo "<br>";
$result = $conn->query($sqllog); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$log =  $row['log'];
	echo "LOG=".$log."<br>";
	$datalog = 1;
}else {
   $datalog = 0;
   echo "NO DATA LOG <br>";
} 

if($datalog==1){
 $sql =  "UPDATE  `tb_log_show` SET `log` = '0' WHERE id_user = '$id_user' ;";
 $result3 = $conn->query($sql);
 if($result3){
   echo "LOG UPDATE ATA  <BR>";	 
 }else {
	 echo " NOT LOG INSERT DATA <BR>";
 }
}else{
 $sql =  "INSERT INTO  `tb_log_show` (`id_user`,`log` )VALUES ('$id_user','0');";
 $result3 = $conn->query($sql);
 if($result3){
   echo "LOG INSERT DATA  <BR>";	 
 }else {
	 echo " NOT LOG INSERT DATA <BR>";
 }	
}
?>