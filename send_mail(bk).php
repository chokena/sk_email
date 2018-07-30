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

echo $id_user;
echo $msg;


$sql =  "SELECT * FROM  `tb_mail`  WHERE  `id_user` =  '$id_user'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$msg_email =  $row['msg'.$msg];
	echo "<br>";
	//echo $row['msg1'];
	
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
$strMessage = " <h1 style='color:red;'> Your above machine alarm !!!  </h1> <br> <h1 style='color:red;'>  $msg_email  </h1> <br> ATTN : $mname <br> Machine No. : $mmac_no <br>    Location : $mloc ";
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

	$mail->Send(); 
 } 
 
 function sendemailSMTP($index,$msg){
    require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "mail.synergywebmonitor.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "iras@synergywebmonitor.com"; // GMAIL username  test@email.mini-iot.com
	$mail->Password = "mUBbiv71f"; // GMAIL password
	$mail->From = "iras@synergywebmonitor.com"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "IRAS MONITOR";  // set from Name
	$mail->Subject = "Your above machine alarm !!!"; 
	$mail->Body = $msg;
    
	//for(
	for($i=0;$i<$index;$i++)
	$mail->AddAddress($txmail[$i]); // to Address

	//$mail->AddAttachment("thaicreate/myfile.zip");
	//$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	//$mail->Send(); 
 	if($mail){
	   echo "ok";
	   $mail->Send();}
	 else{
		 echo "on kay";
	  }
   
 }
 
$sql1 =  "SELECT * FROM  `tb_email`  WHERE  `id_user` =  '$id_user'";
 $result1 = $conn->query($sql1); 
if ($result1->num_rows > 0) {
	$row1 = $result1->fetch_assoc();
	for($i=1;$i<11;$i++){
		echo $row1['mail'.$i];
		if($row1['mail'.$i] ==""){
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
sendemailSMTP($max,$strMessage);

$tm_time = date("d/m/Y  h:i:sa");
echo $tm_time;
echo "<br>";
$sql3 =  "INSERT INTO  `db_log_error` (`id_user` ,`name_er` ,`time` ,`num_er`)VALUES ('$id_user',  '$msg_email ',  '$tm_time',  '$msg');";
 $result3 = $conn->query($sql3);
 if($result3){
   echo "insert OK";	 
 }else {
	 echo "NOT OK";
 }
 

	
?>

<body>
</body>
</html>