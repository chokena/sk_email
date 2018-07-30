<?php
 
include "connect.php";
$id_user = $_GET['id_user'];

$date  = date("d_m_Y");	
$data_l = $_GET['date_in'];
if($_GET['date_in'] !="") { 
   $date_g = explode("-",$_GET['date_in']);
   $date_in = $date_g[2]."/".$date_g[1]."/".$date_g[0];
}

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

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('test_img');
$objDrawing->setDescription('test_img');
$objDrawing->setPath('images/logo.jpg');
$objDrawing->setCoordinates('A1');                      
//setOffsetX works properly
$objDrawing->setOffsetX(5); 
$objDrawing->setOffsetY(5);                
//set width, height
$objDrawing->setWidth(120); 
$objDrawing->setHeight(50); 
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


 $sql1 =  "SELECT * FROM  `tb_machine`  WHERE  `id_user` ='$id_user' "; 

		$result1 = $conn->query($sql1); 
		if ($result1->num_rows > 0) {
			$row1 = $result1->fetch_assoc();
			$name1 = $row1['name']; 
			$mac = $row1['mac_no'];
			$loca = $row1['location']; 
		}
 
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A5:B5');
$objPHPExcel->getActiveSheet()->setCellValue('A5', 'Name');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C5:E5');
$objPHPExcel->getActiveSheet()->setCellValue('C5', $name1);
 
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A5:B5')->applyFromArray($styleArray);
unset($styleArray);	

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('C5:E5')->applyFromArray($styleArray);
unset($styleArray);	


$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A6:B6');
$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Number');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C6:E6');
$objPHPExcel->getActiveSheet()->setCellValue('C6', $mac);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A6:B6')->applyFromArray($styleArray);
unset($styleArray);	

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('C6:E6')->applyFromArray($styleArray);
unset($styleArray);	


$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A7:B7');
$objPHPExcel->getActiveSheet()->setCellValue('A7', 'Location');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C7:E7');
$objPHPExcel->getActiveSheet()->setCellValue('C7', $loca);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A7:B7')->applyFromArray($styleArray);
unset($styleArray);	

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('C7:E7')->applyFromArray($styleArray);
unset($styleArray);	





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
    ->getStyle('A9:L9')
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A9:L9')->applyFromArray($styleArray);
unset($styleArray);	

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A9', 'number')
            ->setCellValue('B9', 'Date/Time')
            ->setCellValue('C9', $msg1)
            ->setCellValue('D9', $msg2)
			->setCellValue('E9', $msg3)
			->setCellValue('F9', $msg4)
			->setCellValue('G9', $msg5)
			->setCellValue('H9', $msg6)
			->setCellValue('I9', $msg7)
			->setCellValue('J9', $msg8)
			->setCellValue('K9', $msg9)
			->setCellValue('L9', $msg10);

     

			
$i=2;
$sql =  "select * from tb_web_monitor_b where id_user = $id_user and date_log LIKE  '".$date_in."%' order by id desc";
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
	  
           if($msg1=="") $d1="";
           if($msg2=="") $d2="";
           if($msg3=="") $d3="";
           if($msg4=="") $d4="";
           if($msg5=="") $d5="";
           if($msg6=="") $d6="";
           if($msg7=="") $d7="";
           if($msg8=="") $d8="";
           if($msg9=="") $d9="";
           if($msg10=="") $d10="";
 $ex = $i+8;
    $objPHPExcel->getActiveSheet()
    ->getStyle('A'.$ex.':L'.$ex)
    ->getAlignment()
    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle('A'.$ex.':L'.$ex)->applyFromArray($styleArray);
unset($styleArray);

		   $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$ex, ($i-1))            
            ->setCellValue('B'.$ex, $d0)
            ->setCellValue('C'.$ex, $d1)
            ->setCellValue('D'.$ex, $d2)
			->setCellValue('E'.$ex, $d3)
			->setCellValue('F'.$ex, $d4)
			->setCellValue('G'.$ex, $d5)
			->setCellValue('H'.$ex, $d6)
			->setCellValue('I'.$ex, $d7)
			->setCellValue('J'.$ex, $d8)
			->setCellValue('K'.$ex, $d9)
			->setCellValue('L'.$ex, $d10);
			 
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
$tx_title = "DATALOG : ".$date;
$objPHPExcel->getActiveSheet()->setTitle("DATALOG");


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="log_data_"'.$data_l.'".xls"');
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
