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
		
for ($col = 'A'; $col != 'M'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}

  $objPHPExcel->getActiveSheet()
    ->getStyle('A1:L1')
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'number')
            ->setCellValue('B1', 'Date/Time')
            ->setCellValue('C1', $msg1)
            ->setCellValue('D1', $msg2)
			->setCellValue('E1', $msg3)
			->setCellValue('F1', $msg4)
			->setCellValue('G1', $msg5)
			->setCellValue('H1', $msg6)
			->setCellValue('I1', $msg7)
			->setCellValue('J1', $msg8)
			->setCellValue('K1', $msg9)
			->setCellValue('L1', $msg10);
			
$i=2;
$sql =  "select * from tb_web_monitor_b where id_user = $id_user ORDER BY id ";
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
		$datal[$i-2][0] = $d0;
		$datal[$i-2][1] = $d1;
		$datal[$i-2][2] = $d2;
		$datal[$i-2][3] = $d3;
		$datal[$i-2][4] = $d4;
		$datal[$i-2][5] = $d5;
		$datal[$i-2][6] = $d6;
		$datal[$i-2][7] = $d7;
		$datal[$i-2][8] = $d8;
		$datal[$i-2][9] = $d9;
		$datal[$i-2][10] = $d10;
        /*
		  $objPHPExcel->getActiveSheet()
    			->getStyle('A'.$i.':L'.$i)
    			->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		   $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, ($i-1))
            ->setCellValue('B'.$i, $d0)
            ->setCellValue('C'.$i, $d1)
            ->setCellValue('D'.$i, $d2)
			->setCellValue('E'.$i, $d3)
			->setCellValue('F'.$i, $d4)
			->setCellValue('G'.$i, $d5)
			->setCellValue('H'.$i, $d6)
			->setCellValue('I'.$i, $d7)
			->setCellValue('J'.$i, $d8)
			->setCellValue('K'.$i, $d9)
			->setCellValue('L'.$i, $d10);
			 */
		   $i++;	
		}
	}
	 
	
/*	
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

*/
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('DATALOG');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
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
