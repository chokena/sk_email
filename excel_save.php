<?php
 
include "connect.php";
$id_user = $_GET['id_user'];

$date  = date("d_m_Y");	

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("SKSYNERGY")
							 ->setLastModifiedBy("SYNERGY")
							 ->setTitle("DATA LOG")
							 ->setSubject("DATA LOG BY SYNERGY")
							 ->setDescription("DATA LOG BY SYNERGY")
							 ->setKeywords("Web Monitor DATALOG")
							 ->setCategory("DATA LOG");


$sql =  "SELECT * FROM  `tb_msg_show`  WHERE  `id_user` ='$id_user' and data_group = '13'"; 
 		$result = $conn->query($sql); 
   		if ($result->num_rows > 0) {	  
	  		$row = $result->fetch_assoc();
	  		$msg1 = $row['msg1'];
			$msg2 = $row['msg2'];
			$msg3 =  $row['msg3'];
			$msg4 =  $row['msg4'];
			$msg5 =  $row['msg5'];
			$msg6 =  $row['msg6'];
			$msg7 =  $row['msg7'];
			$msg8 =  $row['msg8'];
			$msg9 =  $row['msg9'];
			$msg10 =  $row['msg10'];
		}else{
		  $msg1 = "";
		  $msg2 = "";
		  $msg3 = "";
		  $msg4 = "";
		  $msg5 = "";
		  $msg6 = "";
		  $msg7 = "";
		  $msg8 = "";
		  $msg9 = "";
		  $msg10 = "";	
		}	

		$datal[0][0] = "Date/Time";
		$datal[0][1] = $msg1;
		$datal[0][2] = $msg2;
		$datal[0][3] = $msg3;
		$datal[0][4] = $msg4;
		$datal[0][5] = $msg5;
		$datal[0][6] = $msg6;
		$datal[0][7] = $msg7;
		$datal[0][8] = $msg8;
		$datal[0][9] = $msg9;
		$datal[0][10] = $msg10;

$c=0;
for($d=1;$d<=31;$d++){
	$year = date('Y');
	$m  = "03";
	if($d<10) $d = "0".$d;
	$dt = $d."/".$m."/".$year;
$sql =  "select * from tb_web_monitor_b where id_user = $id_user and LEFT(date_log ,10) = '".$dt."'";
	$result = $conn->query($sql); 
   	if ($result->num_rows > 0) {	  
		$ldate[$c] = $d."/".$m."/".$year;
		$dayn[$c] = $d."_".$m."_".$year;
		//echo $ldate[$c]."<BR>";
		 $c++;
	}

}
for($t=0;$t<5;$t++){
//echo $ldate[0].":".$c;
$objPHPExcel->createSheet();
// Add some data to the second sheet, resembling some different data types
 $objPHPExcel->setActiveSheetIndex($t);
 $objPHPExcel->getActiveSheet()->setTitle('LOG_'.$dayn[$t]);

$i=1;
$sql =  "select * from tb_web_monitor_b where id_user = $id_user and LEFT(date_log ,10) = '".$ldate[$t]."' ORDER BY id desc";
	$result = $conn->query($sql); 
   	if ($result->num_rows > 0) {	  
		while($row = $result->fetch_assoc()){
		   $d0 = $row['date_log'];
		   $d1 = $row['time_on'];
		   $d2 = $row['time_off'];
		   $d3 = $row['d1'];
		   $d4 = $row['d2'];
		   $d5 = $row['ch1'];
		   $d6 = $row['ch2'];
		   $d7 = $row['ch3'];
		   $d8 = $row['ch4'];
		   $d9 = $row['ch5'];	
		   $d10 = $row['ch6'];
		$datal[$i][0] = $d0;
		if($msg1!="")	$datal[$i][1] = $d1;
		if($msg2!="")	$datal[$i][2] = $d2;
		if($msg3!="")	$datal[$i][3] = $d3;
		if($msg4!="")	$datal[$i][4] = $d4;
		if($msg5!="")	$datal[$i][5] = $d5;
		if($msg6!="")	$datal[$i][6] = $d6;
		if($msg7!="")	$datal[$i][7] = $d7;
		if($msg8!="")	$datal[$i][8] = $d8;
		if($msg9!="")	$datal[$i][9] = $d9;
		if($msg10!="")	$datal[$i][10] = $d10;
         //echo $datal[$i][0];
		 $i++;
		 
		}
	}

 

for ($col = 'A'; $col != 'L'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}

  $objPHPExcel->getActiveSheet()
    ->getStyle('A1:L1')
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 


	$objPHPExcel->getActiveSheet()
    ->fromArray(
        $datal,  // The data to set        // Array values with this value will not be set
        'A1'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    );
   $objPHPExcel->getActiveSheet()
    ->getStyle()
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 
  
}
 
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="log_data_all"'.$date.'".xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
 