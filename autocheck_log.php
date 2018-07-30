<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>auto check log</title>
</head>
<?
 
include("connect.php");

$datet = date("d/m/Y");
echo "DATE :".$datet."<br>";

$sql1 =  "SELECT * FROM  `tb_countsend` "; 	
$res = $conn->query($sql1); 
if ($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		$sendnum =  $row['send'];
		$datasend =  $row['date'];
		$numid =  $row['num'];	
}


if($datet!=$datasend){
	$sql =  "update  `tb_countsend` set send = '0' ,date = '$datet' ,num = '1' "; 
	$res = $conn->query($sql); 
	echo $res;
    echo "NO";
	$numid = 1;
}

$sql1 =  "SELECT * FROM  `tb_countsend` "; 	
$res = $conn->query($sql1); 
if ($res->num_rows > 0) {
		$row = $res->fetch_assoc();
		$sendnum =  $row['send'];
		$datasend =  $row['date'];
		$numid =  $row['num'];	
		echo "Num = ".$sendnum."<br>";
		echo "DATE : ".$datasend."<br>";
		echo "MAIL : ".$numid."<br>"; 
}

 	
$sql10 =  "SELECT * FROM  `tb_emailsend` where id  = '$numid'"; 
$res1 = $conn->query($sql10); 
if ($res->num_rows > 0) {
	$row10 = $res1->fetch_assoc();
	$useremail =  $row10['user'];
	$passemail =  $row10['pass'];	
	echo "Mail = ".$useremail."<br>";
	echo "Pass = ".$passemail."<br>";
	//echo $numid."<br>"; 
}


  
 function sendm($textmsg){
   require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "chokena@gmail.com"; // GMAIL username
	$mail->Password = "okpL64F=8rkomv'"; // GMAIL password
	$mail->From = "chokena@gmail.com"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "Chokena Panthong";  // set from Name
	$mail->Subject = "log RUN WEB IRAS."; 
	$mail->Body = "RUN IRAS NODE MCU".$textmsg;

	$mail->AddAddress("chokena@gmail.com", "Mr.Adisorn Boonsong"); // to Address

	//$mail->AddAttachment("thaicreate/myfile.zip");
	//$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	//$mail->Send();
	if(!$mail->Send()){
 		echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else{
 		echo "Message has been sent";
	} 
 } 

function sendAdmin($mail_send,$sub,$strMessage,$useremail,$passemail){
    require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	//$mail->SetLanguage( 'en', 'language/');
	//$body = $strMessage;
	//$mail->CharSet = "utf-8";
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "mail.synergywebmonitor.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username =  $useremail;   // "iras@synergywebmonitor.com"; // GMAIL username  test@email.mini-iot.com
	$mail->Password = $passemail;    //"mUBbiv71f"; // GMAIL password
	$mail->From = $useremail;        // "iras@synergywebmonitor.com"; // "name@yourdomain.com";
	$mail->FromName = "IRAS MONITOR";  // set from Name
	$mail->Subject = $sub; 
	$mail->Body = $strMessage;
	//$mail->MsgHTML($body);
    //$mail->MsgHTML($msg);
	$mail->AddAddress($mail_send);
	 
	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	//$mail->Send(); 
 	if(!$mail->Send()){
 		echo "Mailer Error: " . $mail->ErrorInfo ."<br>" ;
	}
	else{
 		echo "Message has been Send  <br>";
	}
}


function mails($strMessage,$id_user,$useremail,$passemail){
	include "connect.php";
	//$strMessage = " <h1 style='color:red;'> NOT CONNECT IRAS BOARD !!!  </h1> <br> <hr align = 'left' width='50%' > <font size='4' color='blue' > ATTN : $mname  </font>  <br> <font size ='4' color='blue'> Machine No. : $mmac_no  </font> <br> <font size='4' color='blue'>   Location : $mloc  </font> <br><hr align = 'left' width='50%'> ";
    echo $strMessage."<BR>";
    echo "SEND ERROR IRAS <BR>";
    sendAdmin("chokena@gmail.com","BOARD IRAS NOT RUN",$strMessage,$useremail,$passemail);
    $sql1 =  "SELECT * FROM  `tb_email`  WHERE  `id_user` =  '$id_user'";
    $result1 = $conn->query($sql1); 
    if ($result1->num_rows > 0) {
	    $row1 = $result1->fetch_assoc();
	for($i=1;$i<11;$i++){
		//echo $row1['mail'.$i];
		if(empty($row1['mail'.$i])){
		  echo "NO MAIL";
		}
		else{
		  //sendemailSMTP($row1['mail'.$i],$strMessage);
		  $txmail[$i] = $row1['mail'.$i];
		  echo "<BR>".$txmail[$i];
		}
		echo "<BR>";
	}
	//echo $row['msg1'];
	
    }

    $max = sizeof($txmail);
    echo "SIZE ARRAY = ".$max . "<BR>";
//sendemailSMTP($max,$strMessage);
//function sendemailSMTP($index,$msg){
	
    if($sendnum >=90){
        echo "OVER <BR> "; 
        $numid= $numid+1;
        $sql =  "update  `tb_countsend` set send = '0' , num = '$numid' "; 
        $res = $conn->query($sql); 
        echo $numid;
        $sendnum = 0; 
  	
    }else{
        echo "NUMST = ".$sendnum ."<BR>";
        $numem = $sendnum+$max; 
        echo "NUM EMAIL = ";
        echo $numem."<br>";
            $sql =  "update  `tb_countsend` set send = '$numem' "; 
            $res = $conn->query($sql); 
    }
	
    require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	//$mail->SetLanguage( 'en', 'language/');
	//$body = $strMessage;
	//$mail->CharSet = "utf-8";
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "mail.synergywebmonitor.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username =  $useremail;   // "iras@synergywebmonitor.com"; // GMAIL username  test@email.mini-iot.com
	$mail->Password = $passemail;    //"mUBbiv71f"; // GMAIL password
	$mail->From = $useremail;        // "iras@synergywebmonitor.com"; // "name@yourdomain.com";
	$mail->FromName = "IRAS MONITOR";  // set from Name
	$mail->Subject = "Alarm NOT Connect IRAS BOARD !!!"; 
	$mail->Body = $strMessage;
	//$mail->MsgHTML($body);
    //$mail->MsgHTML($msg);
	 if($max==1) $mail->AddAddress($txmail[1]);
	 if($max==2){		 
	 	$mail->AddAddress($txmail[1]);
	 	$mail->AddAddress($txmail[2]);
	 }
	 if($max==3){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 }
	 if($max==4){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 }
	 if($max == 5){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 }
	 if($max ==6 ){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 	 $mail->AddAddress($txmail[6]);
	 }
	 if($max ==7){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 	 $mail->AddAddress($txmail[6]);
	 	 $mail->AddAddress($txmail[7]);
	 }
	 if($max==8){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 	 $mail->AddAddress($txmail[6]);
	 	 $mail->AddAddress($txmail[7]);
	 	 $mail->AddAddress($txmail[8]);
	 }
	 if($max==9){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 	 $mail->AddAddress($txmail[6]);
	 	 $mail->AddAddress($txmail[7]);
	 	 $mail->AddAddress($txmail[8]);
	   	 $mail->AddAddress($txmail[9]);
	 }
	 if($max==10){
		 $mail->AddAddress($txmail[1]);
		 $mail->AddAddress($txmail[2]);
		 $mail->AddAddress($txmail[3]);
	 	 $mail->AddAddress($txmail[4]);
	 	 $mail->AddAddress($txmail[5]);
	 	 $mail->AddAddress($txmail[6]);
	 	 $mail->AddAddress($txmail[7]);
	 	 $mail->AddAddress($txmail[8]);
	   	 $mail->AddAddress($txmail[9]);
	  	 $mail->AddAddress($txmail[10]);
	 }
	 	  	
	//for(
	/*
	for($t=1;$t<$max+1;$t++){
	//$mail->AddAddress("chokena@gmail.com");
	 $mail->AddAddress($txmail[t]);
	//$mail->AddAddress($txmail[3]);
	//$mail->AddAddress($txmail[4]);
	//$mail->AddCC($txmail[$t]);
	 echo  "Email>>	".$txmail[$t]."<BR>";
	}// to Address
    */
	//$mail->AddAddress("chokena@gmail.com");
	//$mail->AddAddress($txmail[$i]);
	//$mail->AddAttachment("thaicreate/myfile.zip");
	//$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	//$mail->Send(); 
 	if(!$mail->Send()){
 		echo "Mailer Error: " . $mail->ErrorInfo ."<br>" ;
	}
	else{
 		echo "Message has been Send  <br>";
	}
}

function sendMail_log($id_user,$useremail,$passemail,$sendnum,$numid){
    include("connect.php");
    echo $id_user."<br>";
    //$date_in = date("d/m/Y");
	//echo $date_in;
    $sql =  "select * from tb_web_monitor_b where id_user = $id_user  order by id DESC";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
         $row = $result->fetch_assoc();
         $l_date = $row['date_log'];
	 		//$total =mysqli_num_rows($result);
			 $ci = substr($l_date,-2,2);
		}

	$time = date('d/m/Y h:i:sa');
	$time_log = explode(" ",$time); 
	$tm_time = explode(":",$time_log[1]);
	$tm_day = explode("/",$time_log[0]);
	$day = $tm_day[0];
	$m = $tm_day[1];
	$y = $tm_day[2];
	$hour = $tm_time[0];
	$min = $tm_time[1];
	$cs = substr($time,-2,2);
	$t_log = explode(" ",$l_date); 
	$t_time = explode(":",$t_log[2]);
	$ts_day = explode("/",$t_log[0]);
	$t_day = $ts_day[0];
	$t_m = $ts_day[1];
	$t_y = $ts_day[2];
	$t_hour = $t_time[0];
	$t_min = $t_time[1];
//echo $t_hour."/".$t_min."::".$hour."/".($min-1);
	$days = date("d/m/Y");
	$sql =  "select * from tb_alm_log where id_user = $id_user and stu = '0' ";
		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
            $row = $result->fetch_assoc();
		    $count =  $row['count'];
			$email =  $row['email'];
			$count = $count+1; 
			if($count>1) $runc=1;
			echo "count = ".$count;
		 }else{
			 $runc=0;
		 }

echo $cs.":".$ci;

if($cs==$ci){
	if($day == $t_day && $m == $t_m && $y == $t_y){
   		if($hour==$t_hour && $t_min <= ($min)){
       		$data_con = "CONNECT"; 
      	    $col = "#0000FF";
			$total =1; 
			$sql =  "update  `tb_alm_log`  set  days='$days' where id_user = '$id_user' "; 
        	$res = $conn->query($sql); 
			 
		}
    else {
       		$data_con = "NOT CONNECT =".$count;
       		$col = "#FF0000";
			$total =0;
			if($email==0){
				$sql =  "update  `tb_alm_log`  set days='$days',count='$count' where id_user = '$id_user' "; 
        		$res = $conn->query($sql);
			}else{
				$sql =  "update  `tb_alm_log`  set  email='0' where  id_user = '$id_user' "; 
        		$res = $conn->query($sql); 
			}
     }
   }else{
        	$data_con = "NOT CONNECT = ".$count;
    		$col = "#FF0000";
			$total =0;
			if($email==0){
				$sql =  "update  `tb_alm_log`  set  count='$count',days='$days' where  id_user = '$id_user' "; 
        		$res = $conn->query($sql); 
			}else{
				$sql =  "update  `tb_alm_log`  set  email='0' where  id_user = '$id_user' "; 
        		$res = $conn->query($sql); 
			}
   }
}else{
	$data_con = "NOT CONNECT C2 =".$count;
    		$col = "#FF0000";
			$total =0;
			if($email==0){
				$sql =  "update  `tb_alm_log`  set count='$count',days='$days' where  id_user = '$id_user' "; 
        		$res = $conn->query($sql); 
			}else{
				$sql =  "update  `tb_alm_log`  set  email='0' where  id_user = '$id_user' "; 
        		$res = $conn->query($sql); 
			}
}
    echo $data_con."<>".$runc;
    echo "<br> RUN:".$total."<BR>";
    $sql0 =  "SELECT * FROM   `tb_machine`   WHERE  `id_user` =  '$id_user'";
    $result0 = $conn->query($sql0); 
    if ($result0->num_rows > 0) {
	    $row0 = $result0->fetch_assoc();
		    $mname =  $row0['name'];
		    $mmac_no =  $row0['mac_no'];
		    $mloc =  $row0['location'];
		
		    echo  $mname."<br>".$mmac_no."<br>".$mloc;

    }
    
    
    
    
    echo $date_in."<BR>";
    if($total==1 && $runc ==0){
        $strMessage = " <h1 style='color:red;'>  IRAS BOARD  RUN OK!!!  </h1> <br> <hr align = 'left' width='50%' > <font size='4' color='blue' > ATTN : $mname  </font>  <br> <font size ='4' color='blue'> Machine No. : $mmac_no  </font> <br> <font size='4' color='blue'>   Location : $mloc  </font> <br><hr align = 'left' width='50%'> ";
        echo $strMessage."<BR>";

        echo "SEND RUN ADMIN <BR>";
		if($email==0){
			$sql =  "update  `tb_alm_log`  set   stu='0',email='1' where id_user = '$id_user' "; 
        	$res = $conn->query($sql); 
			mails($strMessage,$id_user,$useremail,$passemail);
			sendAdmin("chokena@gmail.com","BOARD IRAS RUN",$strMessage,$useremail,$passemail);
		}
        //sendAdmin("qc3@sksynergy.com","BOARD IRAS RUN",$strMessage,$useremail,$passemail);
        
        //sendm($strMessage);
    }
    if($total==0  && $runc ==1 ){

			$sql =  "update  `tb_alm_log`  set stu = '1',days='$days',email='0' where id_user = '$id_user' "; 
    		$res = $conn->query($sql);
			$strMessage = " <h1 style='color:red;'> NOT CONNECT IRAS BOARD !!!  </h1> <br> <hr align = 'left' width='50%' > <font size='4' color='blue' > ATTN : $mname  </font>  <br> <font size ='4' color='blue'> Machine No. : $mmac_no  </font> <br> <font size='4' color='blue'>   Location : $mloc  </font> <br><hr align = 'left' width='50%'> ";
			mails($strMessage,$id_user,$useremail,$passemail);
			//sendAdmin("chokena@gmail.com","BOARD IRAS RUN",$strMessage,$useremail,$passemail);
	}
}

//echo "AAAA";
$sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `web` =  '1' ";
 $result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
	while($row1 = $result1->fetch_assoc()){
        $idu = $row1['id_user'];
        $sql2 =  "SELECT * FROM  `tb_alm_log`  WHERE  `id_user` =  '$idu'";
        $result = $conn->query($sql2); 
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "ID USER SEND:".$row['id_user']."<BR>";  
            sendMail_log($row['id_user'],$useremail,$passemail,$numid);
        }
        
     
    }
}

 
   
//sendm();
?>
<body>
</body>
</html>