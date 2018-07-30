<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("connect.php");
$id_user = $_GET['id_user'];
$id = $_GET['id'];
echo $id."<BR>";
echo $id_user;

$sql3 =  "DELETE   from   `tb_msg_show`  where id = '$id' ";
$result3 = $conn->query($sql3);
 if($result3){
    echo "<script > alert('ลบข้อมูลเรียบร้อยแล้ว'); </script>";
			echo '<script type="text/javascript">
           window.location = "add_text_data_monitor.php?id_user='.$id_user.'"
      </script>'; 
 }else {
	 echo "ไม่สามารถลบข้อมูลได้ ";
 }
?>