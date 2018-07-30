<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send_mail</title>
</head>
<?
 
include("connect.php");
$id_user = $_GET['id'];
$msg = $_GET['msg'];

echo "USER ID = ".$id_user."<BR>";
echo "ALRAM SENEOR = ".$msg."<BR>";

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




$sql =  "SELECT * FROM  `tb_mail`  WHERE  `id_user` =  '$id_user'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$msg_email =  $row['msg'.$msg];
	echo "<br>";
	if($msg_email==""){
	  echo "NULL <BR>";	
	  	$sendmsg= false;
	}else {
		//$sendmsg= true;
		// /*
		$sql =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` =  '$id_user' and web = '1'"; 
		$result1 = $conn->query($sql); 
       if ($result1->num_rows > 0) {			
		   $sql1 =  "SELECT * FROM  `tb_web_monitor_b`   WHERE  `id_user` =  '$id_user' order by `id` desc"; 
		   $result2 = $conn->query($sql1);
		    if ($result2->num_rows > 0) {
				 $row1 = $result2->fetch_assoc();
				 if($row1['ch1'] == '000.00') $sendmsg = true; 
				 else $sendmsg = false;
			}else{
				$sendmsg= true;
			}
	    }else{
		 $sendmsg= true;  
	    }
	   //	*/
	}
	//echo $row['msg1'];
	
}

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
$sql0 =  "SELECT * FROM   `tb_machine`   WHERE  `id_user` =  '$id_user'";
 $result0 = $conn->query($sql0); 
if ($result0->num_rows > 0) {
	$row0 = $result0->fetch_assoc();
		$mname =  $row0['name'];
		$mmac_no =  $row0['mac_no'];
		$mloc =  $row0['location'];
		
		echo  $mname."<br>".$mmac_no."<br>".$mloc;
	
	//echo $row['msg1'];
	
}
$strMessage = " <h1 style='color:red;'> Your  machine alarm !!!  </h1> <br> <h1 style='color:red;'> Error:  $msg_email  </h1> <br> <hr align = 'left' width='50%' > <font size='4' color='blue' > ATTN : $mname  </font>  <br> <font size ='4' color='blue'> Machine No. : $mmac_no  </font> <br> <font size='4' color='blue'>   Location : $mloc  </font> <br><hr align = 'left' width='50%'> ";
echo $strMessage;
 
 function sendm(){
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
	$mail->Subject = "Test sending mail."; 
	$mail->Body = "My Body & <b>My Description</b>";

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

if($sendmsg){
 
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
	$mail->Subject = "Your above machine alarm !!!"; 
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
   
//sendm();

date_default_timezone_set("Asia/Bangkok");
$tm = date("H:i:s");
$year = date("Y")+543;
$tm_time = date("d/m")."/".$year." ".$tm;


//$tm_time = date("d/m/Y  h:i:sa");
echo $tm_time;
echo "<br>";
$sql3 =  "INSERT INTO  `db_log_error` (`id_user` ,`name_er` ,`time` ,`num_er`)VALUES ('$id_user',  '$msg_email ',  '$tm_time',  '$msg');";
 $result3 = $conn->query($sql3);
 if($result3){
   echo "insert OK  <BR>";	 
 }else {
	 echo " NOT INSERT DATA <BR>";
 }
 echo "SEND  Email DATA OK <BR> "; 
}
else 
  echo "NOT SEND  Email  DATA  <BR>";


if($datalog==1){
 $sql =  "UPDATE  `tb_log_show` SET `log` = '1' WHERE id_user = '$id_user' ;";
 $result3 = $conn->query($sql);
 if($result3){
   echo "LOG UPDATE ATA  <BR>";	 
 }else {
	 echo " NOT LOG INSERT DATA <BR>";
 }
}else{
 $sql =  "INSERT INTO  `tb_log_show` (`id_user`,`log` )VALUES ('$id_user','1');";
 $result3 = $conn->query($sql);
 if($result3){
   echo "LOG INSERT DATA  <BR>";	 
 }else {
	 echo " NOT LOG INSERT DATA <BR>";
 }	
}
?>
<body>
</body>
</html>