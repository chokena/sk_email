
<? 
/*
session_start();
$chk = $_SESSION["encap"]; 
if($chk!= "admin"){
		
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>จัดการข้อมูลแสดงผล</title>

</head>
<link href="table_show.css"  rel="stylesheet" type="text/css"  />
<?
 include("connect.php");
$u = $_GET['id_user'];
$id_user = $_GET['id_user'];
//echo $u;
$count =1;
while($count<=16){
$sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` =  '$u' && data_group =$count "; 
$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$id_user = $row['id_user'];
        $msg_g[$count] = $row['msg_group'];
		$group[$count] = $row['data_group'];
		//echo $count;
		//echo $group[$count];
	} 
	$count++;
}
 $link_data = "add_monitor_text.php";
?>
<body>
<table width="80%" border="0" align="center">
  <tr>
     <td><center>
      <a href="madmin.php"><img src="images/logo.jpg" width="272" height="110" /></a>
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#FFF4CC"><form id="form1" name="form1" method="post" action="edit_usermac.php">
            <p> <center> <font size="+2" color="#0000FF" > จัดการข้อมูลแสดงผล </font> </center><br />
        </p>
     
        <table width="96%" border="0" align="center" class="bordered">
          <tr>
            <th colspan="12" class="bordered">จัดการข้อมูล  INPUT / OUTPUT </th>
            </tr>
          <tr>
            <td width="8%" class="bordered" ><? 
			//echo $group;
            echo $msg_g[1];
			if($group[1] ==1) {
                            $pic_link = "images/editem.png";
                            $p = 1;
                        }else{
                            $pic_link ="images/icon_list.png";
                            $p =2;
                        }?>
                <a href="<?php echo $link_data; ?>?id_user=<?php echo $id_user; ?>&group=1&p=<? echo $p; ?>" >
                    <img src="<? echo $pic_link ?>" width="50" /> </a>
            <br /> <? if($group[1] ==1) 
			echo "<font color='#FF0000' >1"; 
			else echo "1"; ?>
            </td> 
            <td width="8%" class="bordered"> <? 
            echo $msg_g[2];
                        if($group[2] ==2){
                            $pic_link = "images/editem.png";
                            $p =1;    
                            
                        }else{
                            $pic_link = "images/icon_list.png" ;
                            $p =2;
                            }?>
                <a href ="<?php echo $link_data ?>?id_user=<?php echo $id_user; ?>&group=2&p=<? echo $p; ?>">
                    <img src ="<? echo  $pic_link; ?>" width="50" /></a>
                <br />
            2</td>
            <td width="8%" class="bordered"><?
            echo $msg_g[3];
                        if($group[3] ==3)
                            $pic_link = "images/editem.png";
			else
                            $pic_link =  "images/icon_list.png";  ?>
                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=3">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            3</td>
            <td width="8%" class="bordered"> <? 
            echo $msg_g[4];
                        if($group[4] ==4)
                            $pic_link =  "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>
                
                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=4">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            4</td>
            <td width="8%" class="bordered">
            <? 
            echo $msg_g[5];
			if($group[5] ==5)
                            $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>
                
                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=5">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br /><?
            if($group[5] ==5) 
			echo "<font color='#FF0000' >5 "; 
			else echo "5"; ?></td>
            <td width="8%" class="bordered"><?
            echo $msg_g[6];
                 if($group[6] ==6)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=6">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[6] ==6) 
			echo "<font color='#FF0000' >6 "; 
			else echo "6 ";  
			?>
            </td>
            <td width="8%" class="bordered"><?
            echo $msg_g[7];
                    if($group[7] ==7)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>
                
                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=7">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
                        <br />
                        <?
			if($group[7] ==7) 
			echo "<font color='#FF0000' >7 "; 
			else echo "7 "; ?></td>
            <td width="8%" class="bordered"><? 
            echo $msg_g[8];
                    if($group[8] ==8)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=8">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
			<br /><?
            if($group[8] ==8) 
			echo "<font color='#FF0000' >8 "; 
			else echo "8 "; ?></td>
            <td width="8%"class="bordered">
            <? echo $msg_g[9]; 
            if($group[9] ==9)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=9">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
			<br /><?
            if($group[9] ==9) 
			echo "<font color='#FF0000' >9 "; 
			else echo "9 "; ?>
            </td>
            <td width="8%"class="bordered"> <?
            echo $msg_g[10];
			if($group[10] ==10)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=10">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br /><?
            if($group[10] ==10) 
			echo "<font color='#FF0000' >10 "; 
			else echo "10 "; ?></td>
            <td width="8%"class="bordered"> <? 
            echo $msg_g[11];
			if($group[11] ==11)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=11">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br /><?
           if($group[11] ==11) 
			echo "<font color='#FF0000' >11 "; 
			else echo "11 "; ?></td>
            <td width="8%"class="bordered"><?
            echo $msg_g[12];
            if($group[12] ==12)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=12">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[12] ==12) 
			echo "<font color='#FF0000' >12 "; 
			else echo "12";?></td>
          </tr>
          <tr>
            <th colspan="12">จัดการข้อมูล Time / Analog</th>
            </tr>
          <tr>
            <td class="bordered"> <?
            echo $msg_g[13];
            if($group[13] ==13)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=13">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[13] ==13) 
			echo "<font color='#FF0000' >1 "; 
			else echo "1";?>
            </td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
          </tr>
          <tr>
            <th colspan="12">จัดการข้อมูล Alram</th>
            </tr>
          <tr>
             <td class="bordered"><?
             echo $msg_g[14];
            if($group[14] ==14)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?> &group=14">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[14] ==14) 
			echo "<font color='#FF0000' >1 "; 
			else echo "1";?> 
             </td>
              <td class="bordered"><?
              echo $msg_g[15];
            if($group[15] ==15)
			    $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=15">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[15] ==15) 
			echo "<font color='#FF0000' >2 "; 
			else echo "2";?>
               </td>
              <td class="bordered"><?
              echo $msg_g[16];
            if($group[16] ==16)
			 $pic_link = "images/editem.png";
			else
                            $pic_link = "images/icon_list.png";  ?>

                <a href="<?php echo $link_data;?>?id_user=<?php echo $id_user; ?>&group=16">
                    <img src="<?php echo $pic_link; ?>" width="50"/> </a>
            <br />
            <? 
			if($group[16] ==16) 
			echo "<font color='#FF0000' >3 "; 
			else echo "3";?>
               </td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
            <td bgcolor="#666666" >&nbsp;</td>
          </tr>
        </table>
    </form></td>
  </tr>
  <tr>
    <td bgcolor="#F4F5D8"><center>
     <font color="#C4C4C4"> Developer by: chokena (mini-iot) </font>
    </center> </td>
  </tr>
</table>
</body>
</html>