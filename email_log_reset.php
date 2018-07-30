<?
include("connect.php");
$id_user = $_GET['user_id']; 
$id = $_GET['id'];
date_default_timezone_set("Asia/Bangkok");
$tm = date("H:i:s");
$year = date("Y")+543;
$time = date("d/m")."/".$year." ".$tm;

$sql = "UPDATE db_log_error SET clear_log='$time' where id='$id' and id_user = '$id_user'";
$result = $conn->query($sql);
 
 if($result){
   echo "<script> alert('จัดการข้อมูลเรียบร้อยแล้ว'); </script> ";
   echo '<script type="text/javascript">
           window.location = "user_show_log.php?id_user='.$id_user.'"
      </script>'; 	 
 }else {
	 echo "NOT OK";
 }

?>